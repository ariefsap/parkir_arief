package com.parkir.arif.eparkir.moduls.ListBookParkir;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;

import com.google.gson.Gson;
import com.google.gson.stream.JsonReader;
import com.parkir.arif.eparkir.R;
import com.parkir.arif.eparkir.helper.ProgressDialogHelper;
import com.parkir.arif.eparkir.model.DaftarBook;
import com.parkir.arif.eparkir.model.DataStorage;
import com.parkir.arif.eparkir.model.ResponseModel;
import com.parkir.arif.eparkir.moduls.LoginActivity;
import com.parkir.arif.eparkir.moduls.ProfilActivity;
import com.parkir.arif.eparkir.moduls.listmall.ListMallActivity;
import com.parkir.arif.eparkir.network.ApiClient;
import com.parkir.arif.eparkir.network.ApiInterface;

import java.io.StringReader;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class ListBookParkirActivity extends AppCompatActivity implements View.OnClickListener {

    private RecyclerView rvBook;
    private ListBookParkirAdapter mAdapter;
    private ProgressDialogHelper mDialog;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_book_parkir);

        setTitle("Parking Solution");
        mDialog = new ProgressDialogHelper(this);

        rvBook = (RecyclerView) findViewById(R.id.rv_book_parkir);
        mAdapter = new ListBookParkirAdapter(this);
        LinearLayoutManager llm = new LinearLayoutManager(this);
        rvBook.setLayoutManager(llm);
        rvBook.setAdapter(mAdapter);

        findViewById(R.id.menu_history).setVisibility(View.GONE);

        ambilData();
        initMenuListener();
    }

    private void initMenuListener(){
        findViewById(R.id.menu_logout).setOnClickListener(this);
        findViewById(R.id.menu_profil).setOnClickListener(this);
        findViewById(R.id.menu_mall).setOnClickListener(this);
    }


    private void ambilData(){
        mDialog.showDialog(null);

        ApiInterface iApi = ApiClient.buatRequest();
        Call<ResponseModel> data = iApi.getDaftarBook();
        data.enqueue(new Callback<ResponseModel>() {
            @Override
            public void onResponse(Call<ResponseModel> call, Response<ResponseModel> response) {
                if(response.body() != null){
                    if (response.body().getStatus() == true){
                        DaftarBook tmpData = new Gson().fromJson(response.body().
                                getData().toString(), DaftarBook.class);

                        mDialog.hide();
                        mAdapter.setData(tmpData.getListBook());
                    }
                    else {
                        mDialog.hide();
                        Toast.makeText(ListBookParkirActivity.this, response.body().getPesan(),
                                Toast.LENGTH_SHORT).show();
                    }
                }else{
                    mDialog.hide();
                    Toast.makeText(ListBookParkirActivity.this, response.body().getPesan(),
                            Toast.LENGTH_SHORT).show();
                }

            }

            @Override
            public void onFailure(Call<ResponseModel> call, Throwable t) {
                t.printStackTrace();
                mDialog.hide();
                Toast.makeText(ListBookParkirActivity.this,
                        "Kesalahan Jaringan", Toast.LENGTH_SHORT).show();}
        });
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.menu_profil:
                startActivity(new Intent(this, ProfilActivity.class));
                break;
            case R.id.menu_mall:
                startActivity(new Intent(this, ListMallActivity.class));
                break;
            case R.id.menu_logout:
                SharedPreferences pref = getSharedPreferences("session", MODE_PRIVATE);
                SharedPreferences.Editor editor = pref.edit();
                editor.putBoolean("is_loggedin", false);
                editor.putString("id_pengguna", "");
                editor.commit();

                Intent iLogin = new Intent(ListBookParkirActivity.this, LoginActivity.class);
                startActivity(iLogin);
                finish();
                break;
        }
    }
}
