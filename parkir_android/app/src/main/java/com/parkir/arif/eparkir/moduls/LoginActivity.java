package com.parkir.arif.eparkir.moduls;

import android.content.Intent;
import android.content.SharedPreferences;
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
import com.parkir.arif.eparkir.model.DataStorage;
import com.parkir.arif.eparkir.model.Profil;
import com.parkir.arif.eparkir.model.ResponseModel;
import com.parkir.arif.eparkir.moduls.ListBookParkir.ListBookParkirActivity;
import com.parkir.arif.eparkir.network.ApiClient;
import com.parkir.arif.eparkir.network.ApiInterface;

import java.io.StringReader;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity {

    private EditText etUname;
    private EditText etPass;
    private Button btnLogin;
    private TextView txtToRegister;
    private ProgressDialogHelper mDialog;

    private SharedPreferences pref;
    private SharedPreferences.Editor editor;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        pref = getSharedPreferences("session", MODE_PRIVATE);
        editor = pref.edit();

        initView();

        Boolean isLoggedin = pref.getBoolean("is_loggedin",false);
        if(isLoggedin){
            DataStorage.idPengguna = pref.getString("id_pengguna", "");
            toDashboard();
        }
    }


    private void initView(){
        etUname = (EditText) findViewById(R.id.et_uname);
        etPass = (EditText) findViewById(R.id.et_pass);
        btnLogin = (Button) findViewById(R.id.btn_masuk);
        txtToRegister = (TextView) findViewById(R.id.txt_register);
        mDialog = new ProgressDialogHelper(this);

        initListener();
    }

    private void initListener(){
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
            login(etUname.getText().toString(), etPass.getText().toString());
            }
        });

        txtToRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                toRegister();
            }
        });
    }

    private void toRegister(){
        Intent i = new Intent(this, RegisterActivity.class);
        startActivity(i);
        finish();
    }

    private void toDashboard(){
        mDialog.hide();
        Intent i = new Intent(this, ListBookParkirActivity.class);
        startActivity(i);
        finish();
    }

    private void login(String uname, String pass){
        mDialog.showDialog(null);

        ApiInterface iApi = ApiClient.buatRequest();
        Call<ResponseModel> data = iApi.login(uname, pass);
        data.enqueue(new Callback<ResponseModel>() {
            @Override
            public void onResponse(Call<ResponseModel> call, Response<ResponseModel> response) {
                if(response.body() != null){
                    if (response.body().getStatus() == true){
                        Gson gson = new Gson();
                        JsonReader reader = new JsonReader(new StringReader(response.body().getData().toString()));
                        reader.setLenient(true);
                        Profil profil = gson.fromJson(reader, Profil.class);

                        DataStorage.idPengguna = profil.getIdPengguna();

                        editor.putBoolean("is_loggedin", true);
                        editor.putString("id_pengguna", profil.getIdPengguna());
                        editor.commit();

                        toDashboard();
                    }
                    else {
                        mDialog.hide();
                        Toast.makeText(LoginActivity.this, response.body().getPesan(), Toast.LENGTH_SHORT).show();
                    }
                }else{
                    mDialog.hide();
                    Toast.makeText(LoginActivity.this, "Terjadi Kesalahan", Toast.LENGTH_SHORT).show();
                }

            }

            @Override
            public void onFailure(Call<ResponseModel> call, Throwable t) {
                t.printStackTrace();
                mDialog.hide();
                Toast.makeText(LoginActivity.this, "Kesalahan Jaringan", Toast.LENGTH_SHORT).show();}
        });
    }
}
