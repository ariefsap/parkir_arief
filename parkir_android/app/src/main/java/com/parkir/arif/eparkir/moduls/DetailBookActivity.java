package com.parkir.arif.eparkir.moduls;

import android.content.Intent;
import android.graphics.Bitmap;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.zxing.BarcodeFormat;
import com.google.zxing.MultiFormatWriter;
import com.google.zxing.WriterException;
import com.google.zxing.common.BitMatrix;
import com.google.zxing.integration.android.IntentIntegrator;
import com.google.zxing.integration.android.IntentResult;
import com.parkir.arif.eparkir.R;
import com.parkir.arif.eparkir.model.Book;
import com.squareup.picasso.Picasso;

import org.json.JSONObject;

import java.util.List;

import static android.graphics.Color.BLACK;
import static android.graphics.Color.WHITE;

public class DetailBookActivity extends AppCompatActivity {

    private TextView txtNama;
    private TextView txtMerk;
    private TextView txtWarna;
    private TextView txtPlat;
    private TextView txtArea;
    private TextView txtJam;
    private Button btnScan;

    private String idBook;
    private ImageView imgProfil;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_book);

        initView();
        getDataIntent();
    }


    private void getDataIntent(){
        Book model = getIntent().getParcelableExtra("model");
        if(model != null){
            txtNama.setText(model.getNamaPengguna());
            txtMerk.setText(model.getMerek());
            txtWarna.setText(model.getWarna());
            txtPlat.setText(model.getPlatNo());
            txtArea.setText(model.getNamaMall());
            txtJam.setText(model.getWaktuBook());
//            Picasso.with(this).load(model.getUrl()).into(imgProfil);
            idBook = model.getIdBook();
        }else{
            Toast.makeText(this, "Terjadi kesalahan saat mengambil data", Toast.LENGTH_SHORT).show();
            idBook = "";
        }
    }

    private void initView(){
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        setTitle("Detail Book");

        txtNama = findViewById(R.id.txt_nama);
        txtMerk = findViewById(R.id.txt_merk);
        txtWarna = findViewById(R.id.txt_warna);
        txtPlat = findViewById(R.id.txt_plat);
        txtArea = findViewById(R.id.txt_area);
        txtJam = findViewById(R.id.txt_jam);
        btnScan = findViewById(R.id.btn_scan);

        imgProfil = findViewById(R.id.img_profil);

        generateQR("Tes");
        btnScan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                IntentIntegrator integrator = new IntentIntegrator(DetailBookActivity.this);
                integrator.setPrompt("Mulai Scan");
                integrator.initiateScan();
//
//                Intent iScan = new Intent(DetailBookActivity.this, ScanBarcodeActivity.class);
//                iScan.putExtra("id_book", idBook);
//                startActivity(iScan);
            }
        });
    }

    public void generateQR(String idBook){
        try {
            Bitmap bitmap = encodeAsBitmap(idBook);
            imgProfil.setImageBitmap(bitmap);
        } catch (WriterException e) {
            e.printStackTrace();
        }
    }

    public static Bitmap encodeAsBitmap(String str) throws WriterException {
        BitMatrix result;
        try {
            result = new MultiFormatWriter().encode(str,
                    BarcodeFormat.QR_CODE, 200, 200, null);
        } catch (IllegalArgumentException iae) {
            // Unsupported format
            return null;
        }
        int w = result.getWidth();
        int h = result.getHeight();
        int[] pixels = new int[w * h];
        for (int y = 0; y < h; y++) {
            int offset = y * w;
            for (int x = 0; x < w; x++) {
                pixels[offset + x] = result.get(x, y) ? BLACK : WHITE;
            }
        }
        Bitmap bitmap = Bitmap.createBitmap(w, h, Bitmap.Config.ARGB_8888);
        bitmap.setPixels(pixels, 0, 200, 0, 0, w, h);
        return bitmap;
    }

    public void onActivityResult(int requestCode, int resultCode, Intent intent) {
        IntentResult scanResult = IntentIntegrator.parseActivityResult(requestCode, resultCode, intent);
        if (scanResult != null) {
            // handle scan result
            String contetnt = scanResult.getContents();
            Toast.makeText(this, contetnt,Toast.LENGTH_SHORT).show();
        }
        // else continue with any other code you need in the method
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
