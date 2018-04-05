package com.parkir.arif.eparkir.model;

import android.os.Parcel;
import android.os.Parcelable;

import com.google.gson.annotations.SerializedName;

/**
 * Created by anasbayu on 12/21/2017.
 */

public class Mall implements Parcelable {
    @SerializedName("id")
    private String id;
    @SerializedName("nama")
    private String nama;
    @SerializedName("alamat")
    private String alamat;
    @SerializedName("slot_total")
    private String slotTotal;
    @SerializedName("slot_terisi")
    private String slotTerisi;
    @SerializedName("biaya")
    private String biaya;
    @SerializedName("jam_buka")
    private String jamBuka;
    @SerializedName("jam_tutup")
    private String jamTutup;
    @SerializedName("deskripsi")
    private String deskripsi;
    @SerializedName("url")
    private String url;

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    public String getSlotTotal() {
        return slotTotal;
    }

    public void setSlotTotal(String slotTotal) {
        this.slotTotal = slotTotal;
    }

    public String getSlotTerisi() {
        return slotTerisi;
    }

    public void setSlotTerisi(String slotTerisi) {
        this.slotTerisi = slotTerisi;
    }

    public String getBiaya() {
        return biaya;
    }

    public void setBiaya(String biaya) {
        this.biaya = biaya;
    }

    public String getJamBuka() {
        return jamBuka;
    }

    public void setJamBuka(String jamBuka) {
        this.jamBuka = jamBuka;
    }

    public String getJamTutup() {
        return jamTutup;
    }

    public void setJamTutup(String jamTutup) {
        this.jamTutup = jamTutup;
    }

    public String getDeskripsi() {
        return deskripsi;
    }

    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }

    public String getUrl() {
        return url;
    }

    public void setUrl(String url) {
        this.url = url;
    }


    protected Mall(Parcel in) {
        id = in.readString();
        nama = in.readString();
        alamat = in.readString();
        slotTotal = in.readString();
        slotTerisi = in.readString();
        slotTerisi = in.readString();
        biaya = in.readString();
        jamBuka = in.readString();
        jamTutup = in.readString();
        deskripsi = in.readString();
        url = in.readString();
    }

    public static final Creator<Mall> CREATOR = new Creator<Mall>() {
        @Override
        public Mall createFromParcel(Parcel in) {
            return new Mall(in);
        }

        @Override
        public Mall[] newArray(int size) {
            return new Mall[size];
        }
    };

    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(id);
        dest.writeString(nama);
        dest.writeString(alamat);
        dest.writeString(slotTotal);
        dest.writeString(slotTerisi);
        dest.writeString(slotTerisi);
        dest.writeString(biaya);
        dest.writeString(jamBuka);
        dest.writeString(jamTutup);
        dest.writeString(deskripsi);
        dest.writeString(url);
    }
}
