package com.parkir.arif.eparkir.model;

import com.google.gson.annotations.SerializedName;


public class Profil {
    public Profil(String idPengguna, String namaDepan, String noInduk, String username, String url, String jenisPengguna, String namaJenisPengguna, String alamat, String noHp) {
        this.idPengguna = idPengguna;
        this.namaDepan = namaDepan;
        this.noInduk = noInduk;
        this.username = username;
        this.url = url;
        JenisPengguna = jenisPengguna;
        this.namaJenisPengguna = namaJenisPengguna;
        this.alamat = alamat;
        this.noHp = noHp;
    }

    public String getIdPengguna() {
        return idPengguna;
    }

    public void setIdPengguna(String idPengguna) {
        this.idPengguna = idPengguna;
    }

    public String getNamaDepan() {
        return namaDepan;
    }

    public void setNamaDepan(String namaDepan) {
        this.namaDepan = namaDepan;
    }

    public String getNoInduk() {
        return noInduk;
    }

    public void setNoInduk(String noInduk) {
        this.noInduk = noInduk;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getUrl() {
        return url;
    }

    public void setUrl(String url) {
        this.url = url;
    }

    public String getJenisPengguna() {
        return JenisPengguna;
    }

    public void setJenisPengguna(String jenisPengguna) {
        JenisPengguna = jenisPengguna;
    }

    public String getNamaJenisPengguna() {
        return namaJenisPengguna;
    }

    public void setNamaJenisPengguna(String namaJenisPengguna) {
        this.namaJenisPengguna = namaJenisPengguna;
    }

    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    public String getNoHp() {
        return noHp;
    }

    public void setNoHp(String noHp) {
        this.noHp = noHp;
    }

    @SerializedName("id_pengguna")
    private String idPengguna;
    @SerializedName("nama_pengguna")
    private String namaDepan;
    @SerializedName("no_induk")
    private String noInduk;
    @SerializedName("username")
    private String username;
    @SerializedName("url")
    private String url;
    @SerializedName("id_jenis_pengguna")
    private String JenisPengguna;
    @SerializedName("jenis_pengguna")
    private String namaJenisPengguna;
    @SerializedName("alamat")
    private String alamat;
    @SerializedName("no_hp")
    private String noHp;


}
