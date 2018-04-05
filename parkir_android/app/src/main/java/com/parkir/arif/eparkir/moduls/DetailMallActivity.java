package com.parkir.arif.eparkir.moduls;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.google.gson.stream.JsonReader;
import com.parkir.arif.eparkir.R;
import com.parkir.arif.eparkir.helper.ProgressDialogHelper;
import com.parkir.arif.eparkir.model.DataStorage;
import com.parkir.arif.eparkir.model.Mall;
import com.parkir.arif.eparkir.model.ResponseModel;
import com.parkir.arif.eparkir.network.ApiClient;
import com.parkir.arif.eparkir.network.ApiInterface;
import com.squareup.picasso.Picasso;

import java.io.StringReader;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

import static com.parkir.arif.eparkir.network.ApiConfig.BASE_IMG_URL;

public class DetailMallActivity extends AppCompatActivity {

    private TextView txtNamaMall;
    private TextView txtAlamatMall;
    private TextView txtSlotTotal;
    private TextView txtSlotTersedia;
    private TextView txtBiaya;
    private TextView txtJamOperasional;
    private Button btnBook;
    private ImageView imgMall;
    private ProgressDialogHelper mDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_mall);
        setTitle("Info Mall");

        initView();
    }

    private void initView(){
        final Mall model = getIntent().getParcelableExtra("model");

        txtNamaMall = findViewById(R.id.txt_nama_mall);
        txtAlamatMall = findViewById(R.id.txt_alamat_mall);
        txtSlotTotal = findViewById(R.id.txt_slot_total_mall);
        txtSlotTersedia = findViewById(R.id.txt_slot_tersedia_mall);
        txtBiaya = findViewById(R.id.txt_biaya_mall);
        txtJamOperasional = findViewById(R.id.txt_jam_operasional_mall);
        btnBook = findViewById(R.id.btn_book);
        imgMall = findViewById(R.id.img_detail_mall);
        mDialog = new ProgressDialogHelper(this);

        txtNamaMall.setText(model.getNama());
        txtAlamatMall.setText(model.getAlamat());
        txtSlotTotal.setText(model.getSlotTotal());

        int total = Integer.parseInt(model.getSlotTotal());
        int terisi = Integer.parseInt(model.getSlotTerisi());
        int tersedia = total - terisi;

        txtSlotTersedia.setText(String.valueOf(tersedia));
        txtBiaya.setText(model.getBiaya());
        txtJamOperasional.setText(model.getJamBuka() + " - " + model.getJamTutup());
        Picasso.with(this).load(BASE_IMG_URL + model.getUrl()).into(imgMall);

        btnBook.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                book(model.getId());
            }
        });
    }

    private void book(String idMall){
//        mDialog.showDialog(null);
        ApiInterface iApi = ApiClient.buatRequest();
        Call<ResponseModel> data = iApi.book(DataStorage.idPengguna, idMall);
        data.enqueue(new Callback<ResponseModel>() {
            @Override
            public void onResponse(Call<ResponseModel> call, Response<ResponseModel> response) {
                if(response.body() != null){
                    if (response.body().getStatus() == true){
                        Gson gson = new Gson();
                        JsonReader reader = new JsonReader(new StringReader(response.body().getData().toString()));
                        reader.setLenient(true);

//                        book(response.body().getPesan());

                    }
                    else {
                        mDialog.hide();
                        Toast.makeText(DetailMallActivity.this, response.body().getPesan(), Toast.LENGTH_SHORT).show();
                    }
                }else{
                    mDialog.hide();
                    Toast.makeText(DetailMallActivity.this, "Terjadi Kesalahan", Toast.LENGTH_SHORT).show();
                }

            }

            @Override
            public void onFailure(Call<ResponseModel> call, Throwable t) {
                t.printStackTrace();
//                mDialog.hide();
                Toast.makeText(DetailMallActivity.this, "Kesalahan Jaringan", Toast.LENGTH_SHORT).show();}
        });
    }
}
