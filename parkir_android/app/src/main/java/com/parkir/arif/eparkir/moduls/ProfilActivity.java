package com.parkir.arif.eparkir.moduls;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Bitmap;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.Toast;

import com.google.gson.Gson;
import com.google.gson.stream.JsonReader;
import com.parkir.arif.eparkir.R;
import com.parkir.arif.eparkir.helper.ProgressDialogHelper;
import com.parkir.arif.eparkir.model.DataStorage;
import com.parkir.arif.eparkir.model.Profil;
import com.parkir.arif.eparkir.model.ResponseModel;
import com.parkir.arif.eparkir.network.ApiClient;
import com.parkir.arif.eparkir.network.ApiInterface;
import com.squareup.picasso.Picasso;

import java.io.IOException;
import java.io.StringReader;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

import static com.parkir.arif.eparkir.network.ApiConfig.BASE_IMG_USER;
import static com.parkir.arif.eparkir.network.ApiConfig.BASE_URL;

public class ProfilActivity extends AppCompatActivity {

    private ImageView imgProfil;
    private EditText etUname;
    private EditText etPass;
    private EditText etAlamat;
    private EditText etHp;
    private EditText etnamaPengguna;
    private Button btnUbah;
    private ProgressDialogHelper mDialog;
    private Profil mProfil;
    private LinearLayout layoutPengguna;
    private Bitmap tmpBitmap;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profil);

        initView();
        tmpBitmap = null;
    }

    void initView(){
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        setTitle("Profil");

        imgProfil = findViewById(R.id.img_edit_profil);
        etUname = findViewById(R.id.et_edit_uname);
        etPass = findViewById(R.id.et_edit_pass);
        etAlamat = findViewById(R.id.et_edit_alamat);
        etHp = findViewById(R.id.et_edit_no_hp);
        etnamaPengguna = findViewById(R.id.et_edit_namaPengguna);
        btnUbah = findViewById(R.id.btn_edit_profil);
        mDialog = new ProgressDialogHelper(this);
        layoutPengguna = findViewById(R.id.layout_form_pengguna);

        btnUbah.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(etUname.getText().toString().equals("") || etPass.getText().toString().equals("") || etnamaPengguna.getText().toString().equals("")){
                    Toast.makeText(ProfilActivity.this, "Tidak boleh kosong", Toast.LENGTH_SHORT).show();
                }else{
//                    String namaPengguna="";
                    String alamat = "";
                    String noHp = "";
                    if(mProfil.getNamaJenisPengguna().equals("pengguna")){
//                        namaPengguna = etnamaPengguna.getText().toString();
                        alamat = etAlamat.getText().toString();
                        noHp = etHp.getText().toString();
                    }else{
//                        namaPengguna=mProfil.getNamaDepan();
                        alamat = mProfil.getAlamat();
                        noHp = mProfil.getNoHp();
                    }
                    updateProfil(etUname.getText().toString(), etPass.getText().toString(),etnamaPengguna.getText().toString(), alamat, noHp);
                }
            }
        });

        imgProfil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent();
                intent.setType("image/*");
                intent.setAction(Intent.ACTION_GET_CONTENT);
                startActivityForResult(Intent.createChooser(intent, "Select Picture"),1);
            }
        });

        getProfile(DataStorage.idPengguna);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case android.R.id.home:
                finish();
                break;
        }
        return true;
    }

    private void getProfile(String idPengguna){
        mDialog.showDialog(null);

        ApiInterface iApi = ApiClient.buatRequest();
        Call<ResponseModel> data = iApi.getProfil(idPengguna);
        data.enqueue(new Callback<ResponseModel>() {
            @Override
            public void onResponse(Call<ResponseModel> call, Response<ResponseModel> response) {
                if(response.body() != null){
                    if (response.body().getStatus() == true){
                        Gson gson = new Gson();
                        JsonReader reader = new JsonReader(new StringReader(response.body().getData().toString()));
                        reader.setLenient(true);
                        Profil profil = gson.fromJson(reader, Profil.class);
                        mProfil = profil;

                        if(!mProfil.getNamaJenisPengguna().equals("tukang parkir")){
                            layoutPengguna.setVisibility(View.VISIBLE);
                        }
                        etnamaPengguna.setText(profil.getNamaDepan());
                        etUname.setText(profil.getUsername());
                        etAlamat.setText(profil.getAlamat());
                        etHp.setText(profil.getNoHp());
                        Picasso.with(ProfilActivity.this).load(BASE_IMG_USER + profil.getUrl()).into(imgProfil);

                        mDialog.hide();
                    }
                    else {
                        mDialog.hide();
                        Toast.makeText(ProfilActivity.this, response.body().getPesan(), Toast.LENGTH_SHORT).show();
                    }
                }else{
                    mDialog.hide();
                    Toast.makeText(ProfilActivity.this, "Terjadi Kesalahan", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<ResponseModel> call, Throwable t) {
                t.printStackTrace();
                mDialog.hide();
                Toast.makeText(ProfilActivity.this, "Kesalahan Jaringan", Toast.LENGTH_SHORT).show();}
        });
    }

    private void updateProfil(String username, String pass,String namaPengguna, String alamat, String noHp){
        mDialog.showDialog(null);

        ApiInterface iApi = ApiClient.buatRequest();
        Call<ResponseModel> data = iApi.updateProfil(DataStorage.idPengguna, username, pass, namaPengguna, alamat, noHp);
        data.enqueue(new Callback<ResponseModel>() {
            @Override
            public void onResponse(Call<ResponseModel> call, Response<ResponseModel> response) {
                if(response.body() != null){
                    mDialog.hide();
                    if (response.body().getStatus() == true){
                        Toast.makeText(ProfilActivity.this, response.body().getPesan(), Toast.LENGTH_SHORT).show();
                        finish();
                    }
                    else {
                        Toast.makeText(ProfilActivity.this, response.body().getPesan(), Toast.LENGTH_SHORT).show();
                    }
                }else{
                    mDialog.hide();
                    Toast.makeText(ProfilActivity.this, "Terjadi Kesalahan", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<ResponseModel> call, Throwable t) {
                t.printStackTrace();
                mDialog.hide();
                Toast.makeText(ProfilActivity.this, "Kesalahan Jaringan", Toast.LENGTH_SHORT).show();}
        });
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data)
    {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == 1) {
            if (resultCode == Activity.RESULT_OK) {
                if (data != null) {
                    try {
                        Bitmap bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), data.getData());

                        imgProfil.setImageBitmap(bitmap);
                        tmpBitmap = bitmap;
                    } catch (IOException e) {
                        e.printStackTrace();
                    }
                }
            } else if (resultCode == Activity.RESULT_CANCELED) {
                Toast.makeText(this, "Cancelled", Toast.LENGTH_SHORT).show();
            }
        }
    }
}


