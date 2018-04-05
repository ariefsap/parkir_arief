package com.parkir.arif.eparkir.moduls;

import android.content.Intent;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.google.gson.stream.JsonReader;
import com.parkir.arif.eparkir.R;
import com.parkir.arif.eparkir.helper.ProgressDialogHelper;
import com.parkir.arif.eparkir.model.ResponseModel;
import com.parkir.arif.eparkir.network.ApiClient;
import com.parkir.arif.eparkir.network.ApiInterface;

import java.io.StringReader;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class RegisterActivity extends AppCompatActivity {

    private EditText etNamaPengguna;
    private EditText etUname;
    private EditText etPass;
    private EditText etPassKonfirmasi;
    private EditText etAlamat;
    private EditText etnoHp;
    private EditText etMerk;
    private EditText etWarna;
    private EditText etPlatNo;
    private Button btnLogin;
    private TextView txtToRegister;
    private ProgressDialogHelper mDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        initView();
    }

    private void initView(){
        etNamaPengguna = (EditText) findViewById(R.id.et_nama_pengguna);
        etUname = (EditText) findViewById(R.id.et_uname);
        etPass = (EditText) findViewById(R.id.et_pass);
        etPassKonfirmasi = (EditText) findViewById(R.id.et_pass_konfirmasi);
        etAlamat = (EditText) findViewById(R.id.et_alamat);
        etnoHp = (EditText) findViewById(R.id.et_no_hp);
        etWarna = (EditText) findViewById(R.id.et_warna);
        etMerk = (EditText) findViewById(R.id.et_merk);
        etPlatNo = (EditText) findViewById(R.id.et_plat);

        btnLogin = (Button) findViewById(R.id.btn_register);
        txtToRegister = (TextView) findViewById(R.id.txt_register);
        mDialog = new ProgressDialogHelper(this);

        initListener();
    }

    private void initListener(){
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                register(etNamaPengguna.getText().toString(), etUname.getText().toString(),
                        etPass.getText().toString(), etPassKonfirmasi.getText().toString(),
                        etAlamat.getText().toString(), etMerk.getText().toString(), etWarna.getText().toString(),
                        etPlatNo.getText().toString(), etnoHp.getText().toString());
            }
        });

        txtToRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                toLogin(null);
            }
        });
    }

    private void toLogin(@Nullable String msg){
        if(msg != null){
            Toast.makeText(this, msg, Toast.LENGTH_SHORT).show();
        }
        Intent i = new Intent(this, LoginActivity.class);
        startActivity(i);
        finish();
    }

    private void toDashboard(String msg){
        mDialog.hide();
        Toast.makeText(this, msg, Toast.LENGTH_SHORT).show();
        Intent i = new Intent(this, LoginActivity.class);
        startActivity(i);
        finish();
    }

    private void register(String namaPengguna, String uname, String pass, String Passkonfirmasi,
                          String alamat, String merk, String warna, String platno, String hp){
        mDialog.showDialog(null);

        ApiInterface iApi = ApiClient.buatRequest();
        Call<ResponseModel> data = iApi.register(namaPengguna, uname, pass, Passkonfirmasi, "2",
                alamat, merk, warna, platno, hp);
        data.enqueue(new Callback<ResponseModel>() {
            @Override
            public void onResponse(Call<ResponseModel> call, Response<ResponseModel> response) {
                if(response.body() != null){
                    if (response.body().getStatus() == true){
                        Gson gson = new Gson();
                        JsonReader reader = new JsonReader(new StringReader(response.body().getData().toString()));
                        reader.setLenient(true);

                        toLogin(response.body().getPesan());
                    }
                    else {
                        mDialog.hide();
                        Toast.makeText(RegisterActivity.this, response.body().getPesan(), Toast.LENGTH_SHORT).show();
                    }
                }else{
                    mDialog.hide();
                    Toast.makeText(RegisterActivity.this, "Terjadi Kesalahan", Toast.LENGTH_SHORT).show();
                }

            }

            @Override
            public void onFailure(Call<ResponseModel> call, Throwable t) {
                t.printStackTrace();
                mDialog.hide();
                Toast.makeText(RegisterActivity.this, "Kesalahan Jaringan", Toast.LENGTH_SHORT).show();}
        });
    }
}
