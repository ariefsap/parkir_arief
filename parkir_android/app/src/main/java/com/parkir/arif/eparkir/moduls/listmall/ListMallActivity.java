package com.parkir.arif.eparkir.moduls.listmall;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;

import com.google.gson.Gson;
import com.parkir.arif.eparkir.R;
import com.parkir.arif.eparkir.helper.ProgressDialogHelper;
import com.parkir.arif.eparkir.model.DaftarBook;
import com.parkir.arif.eparkir.model.DaftarMall;
import com.parkir.arif.eparkir.model.ResponseModel;
import com.parkir.arif.eparkir.moduls.ListBookParkir.ListBookParkirActivity;
import com.parkir.arif.eparkir.moduls.ListBookParkir.ListBookParkirAdapter;
import com.parkir.arif.eparkir.moduls.LoginActivity;
import com.parkir.arif.eparkir.moduls.ProfilActivity;
import com.parkir.arif.eparkir.network.ApiClient;
import com.parkir.arif.eparkir.network.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class ListMallActivity extends AppCompatActivity implements View.OnClickListener{

    private RecyclerView rv;
    private ListMallAdapter mAdapter;
    private ProgressDialogHelper mDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_mall);

        setTitle("Daftar Mall");
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        mDialog = new ProgressDialogHelper(this);
        rv = findViewById(R.id.rv_list_mall);
        mAdapter = new ListMallAdapter(this);
        LinearLayoutManager llm = new LinearLayoutManager(this);
        rv.setLayoutManager(llm);
        rv.setAdapter(mAdapter);

        ambilData();
//        initMenuListener();
    }

//    private void initMenuListener(){
//        findViewById(R.id.menu_logout).setOnClickListener(this);
//        findViewById(R.id.menu_profil).setOnClickListener(this);
//    }


    private void ambilData(){
        mDialog.showDialog(null);

        ApiInterface iApi = ApiClient.buatRequest();
        Call<ResponseModel> data = iApi.getDaftarMall();
        data.enqueue(new Callback<ResponseModel>() {
            @Override
            public void onResponse(Call<ResponseModel> call, Response<ResponseModel> response) {
                if(response.body() != null){
                    if (response.body().getStatus() == true){
                        DaftarMall tmpData = new Gson().fromJson(response.body().
                                getData().toString(), DaftarMall.class);

                        mDialog.hide();
                        mAdapter.setData(tmpData.getListMall());
                    }
                    else {
                        mDialog.hide();
                        Toast.makeText(ListMallActivity.this, response.body().getPesan(),
                                Toast.LENGTH_SHORT).show();
                    }
                }else{
                    mDialog.hide();
                    Toast.makeText(ListMallActivity.this, response.body().getPesan(),
                            Toast.LENGTH_SHORT).show();
                }

            }

            @Override
            public void onFailure(Call<ResponseModel> call, Throwable t) {
                t.printStackTrace();
                mDialog.hide();
                Toast.makeText(ListMallActivity.this,
                        "Kesalahan Jaringan", Toast.LENGTH_SHORT).show();}
        });
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.menu_profil:
                startActivity(new Intent(this, ProfilActivity.class));
                break;
            case R.id.menu_history:
                startActivity(new Intent(this, ProfilActivity.class));
                break;
            case R.id.menu_logout:
                SharedPreferences pref = getSharedPreferences("session", MODE_PRIVATE);
                SharedPreferences.Editor editor = pref.edit();
                editor.putBoolean("is_loggedin", false);
                editor.putString("id_pengguna", "");
                editor.commit();

                Intent iLogin = new Intent(ListMallActivity.this, LoginActivity.class);
                startActivity(iLogin);
                finish();
                break;
        }
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

}
