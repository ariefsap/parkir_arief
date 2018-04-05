package com.parkir.arif.eparkir.moduls.listmall;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.parkir.arif.eparkir.R;
import com.parkir.arif.eparkir.model.Book;
import com.parkir.arif.eparkir.model.Mall;
import com.parkir.arif.eparkir.moduls.DetailBookActivity;
import com.parkir.arif.eparkir.moduls.DetailMallActivity;
import com.squareup.picasso.Picasso;

import java.util.Collections;
import java.util.List;

import static com.parkir.arif.eparkir.network.ApiConfig.BASE_IMG_URL;


public class ListMallAdapter extends RecyclerView.Adapter<ListMallAdapter.mViewHolder> {
    private List<Mall> data;
    private Context mConteext;

    public static class mViewHolder extends RecyclerView.ViewHolder {
        TextView txtNamaMall, etxtLokasi;
        ImageView imgMall;
        CardView row;

        mViewHolder(View itemView) {
            super(itemView);
            row = itemView.findViewById(R.id.cv_mall);
            txtNamaMall = itemView.findViewById(R.id.txt_nama_mall);
            etxtLokasi =  itemView.findViewById(R.id.txt_lokasi_mall);
            imgMall = itemView.findViewById(R.id.img_mall);
        }
    }

    // Konstruktor.
    public ListMallAdapter(Context konteks){
        this.mConteext = konteks;
        this.data = Collections.emptyList();
    }

    public void setData(List<Mall> data){
        this.data = Collections.emptyList();
        this.data = data;
        notifyDataSetChanged();
    }

    @Override
    public ListMallAdapter.mViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v;

        v = LayoutInflater.from(parent.getContext()).inflate(R.layout.row_mall, parent, false);
        ListMallAdapter.mViewHolder vh = new ListMallAdapter.mViewHolder(v);

        return vh;
    }

    @Override
    public void onBindViewHolder(ListMallAdapter.mViewHolder holder, final int position) {
        holder.txtNamaMall.setText(data.get(position).getNama());
        holder.etxtLokasi.setText(data.get(position).getAlamat());
        Picasso.with(mConteext).load(BASE_IMG_URL + data.get(position).getUrl()).into(holder.imgMall);
        holder.row.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent iDetail = new Intent(mConteext, DetailMallActivity.class);;
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
