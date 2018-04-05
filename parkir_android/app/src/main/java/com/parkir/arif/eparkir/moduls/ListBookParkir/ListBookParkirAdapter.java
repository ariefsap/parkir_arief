package com.parkir.arif.eparkir.moduls.ListBookParkir;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.parkir.arif.eparkir.R;
import com.parkir.arif.eparkir.model.Book;
import com.parkir.arif.eparkir.model.Profil;
import com.parkir.arif.eparkir.moduls.DetailBookActivity;
import com.parkir.arif.eparkir.network.ApiConfig;
import com.squareup.picasso.Picasso;

import java.util.Collections;
import java.util.List;


public class ListBookParkirAdapter extends RecyclerView.Adapter<ListBookParkirAdapter.mViewHolder> {
    private List<Book> data;
    private Context mConteext;

    public static class mViewHolder extends RecyclerView.ViewHolder {
        TextView txtTitle, txtLokasi, txtWaktu, txtWarna, txtPlat, txtMerek;
        CardView row;

        mViewHolder(View itemView) {
            super(itemView);
            row = (CardView) itemView.findViewById(R.id.cv_book_parkir);
            txtTitle = (TextView) itemView.findViewById(R.id.txt_nama);
            txtLokasi = (TextView) itemView.findViewById(R.id.txt_lokasi);
            txtWaktu = (TextView) itemView.findViewById(R.id.txt_jam);
            txtWarna = (TextView) itemView.findViewById(R.id.txt_warna);
            txtPlat = (TextView) itemView.findViewById(R.id.txt_plat);
            txtMerek = (TextView) itemView.findViewById(R.id.txt_merek);
        }
    }

    // Konstruktor.
    public ListBookParkirAdapter(Context konteks){
        this.mConteext = konteks;
        this.data = Collections.emptyList();
    }

    public void setData(List<Book> data){
        this.data = Collections.emptyList();
        this.data = data;
        notifyDataSetChanged();
    }

    @Override
    public ListBookParkirAdapter.mViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v;

        v = LayoutInflater.from(parent.getContext()).inflate(R.layout.row_book_parkir, parent, false);
        ListBookParkirAdapter.mViewHolder vh = new ListBookParkirAdapter.mViewHolder(v);

        return vh;
    }

    @Override
    public void onBindViewHolder(ListBookParkirAdapter.mViewHolder holder, final int position) {
        holder.txtTitle.setText("Nama: " + data.get(position).getNamaPengguna());
        holder.txtLokasi.setText("Lokasi: " + data.get(position).getNamaMall());
        holder.txtWaktu.setText("Waktu: " + data.get(position).getWaktuBook());
        holder.txtMerek.setText("Merk: " + data.get(position).getMerek());
        holder.txtPlat.setText("Plat no: " + data.get(position).getPlatNo());
        holder.txtWarna.setText("Warna: " + data.get(position).getWarna());

        holder.row.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent iDetail = new Intent(mConteext, DetailBookActivity.class);;
                iDetail.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                iDetail.putExtra("model", data.get(position));
                mConteext.startActivity(iDetail);
            }
        });
    }

    @Override
    public int getItemCount() {
        return data.size();
    }

    @Override
    public void onAttachedToRecyclerView(RecyclerView recyclerView) {
        super.onAttachedToRecyclerView(recyclerView);
    }
}
