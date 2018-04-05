package com.parkir.arif.eparkir.model;

import android.os.Parcel;
import android.os.Parcelable;

import com.google.gson.annotations.SerializedName;



public class Book implements Parcelable{
    @SerializedName("nama_pengguna")
    private String namaPengguna;
    @SerializedName("waktu_book")
    private String waktuBook;
    @SerializedName("nama_mall")
    private String namaMall;
    @SerializedName("id_book")
    private String idBook;
    @SerializedName("merek")
    private String merek;
    @SerializedName("warna")
    private String warna;
    @SerializedName("plat_no")
    private String platNo;
    @SerializedName("url")
    private String url;

    public String getNamaPengguna() {
        return namaPengguna;
    }

    public void setNamaPengguna(String namaPengguna) {
        this.namaPengguna = namaPengguna;
    }

    public String getNamaMall() {
        return namaMall;
    }

    public void setNamaMall(String namaMall) {
        this.namaMall = namaMall;
    }

    public String getIdBook() {
        return idBook;
    }

    public void setIdBook(String idBook) {
        this.idBook = idBook;
    }

    public String getMerek() {
        return merek;
    }

    public void setMerek(String merek) {
        this.merek = merek;
    }

    public String getWarna() {
        return warna;
    }

    public void setWarna(String warna) {
        this.warna = warna;
    }

    public String getPlatNo() {
        return platNo;
    }

    public void setPlatNo(String platNo) {
        this.platNo = platNo;
    }

    public String getWaktuBook() {
        return waktuBook;
    }

    public void setWaktuBook(String waktuBook) {
        this.waktuBook = waktuBook;
    }

    public String getUrl() {
        return url;
    }

    public void setUrl(String url) {
        this.url = url;
    }

    protected Book(Parcel in) {
        namaPengguna = in.readString();
        namaMall = in.readString();
        idBook = in.readString();
        merek = in.readString();
        warna = in.readString();
        platNo = in.readString();
        waktuBook = in.readString();
        url = in.readString();
    }

    public static final Creator<Book> CREATOR = new Creator<Book>() {
        @Override
        public Book createFromParcel(Parcel in) {
            return new Book(in);
        }

        @Override
        public Book[] newArray(int size) {
            return new Book[size];
        }
    };

    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(namaPengguna);
        dest.writeString(namaMall);
        dest.writeString(idBook);
        dest.writeString(merek);
        dest.writeString(warna);
        dest.writeString(platNo);
        dest.writeString(waktuBook);
        dest.writeString(url);
    }
}
