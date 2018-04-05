package com.parkir.arif.eparkir.network;

import com.parkir.arif.eparkir.model.ResponseModel;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;


public interface ApiInterface {
    @FormUrlEncoded
    @POST(ApiConfig.LOGIN)
    Call<ResponseModel> login(@Field("username") String username, @Field("password") String pass);

    @FormUrlEncoded
    @POST(ApiConfig.REGISTER)
    Call<ResponseModel> register(@Field("nama_pengguna") String namaPengguna,
                                 @Field("username") String username,
                                 @Field("password") String pass,
                                 @Field("password_konfirmasi") String passKonfirmasi,
                                 @Field("id_jenis_pengguna") String idJenisPengguna,
                                 @Field("alamat") String alamat,
                                 @Field("merk") String merk,
                                 @Field("warna") String warna,
                                 @Field("plat_no") String platno,
                                 @Field("no_hp") String hp);

    @GET(ApiConfig.GET_ALL_BOOK)
    Call<ResponseModel> getDaftarBook();

    @GET(ApiConfig.GET_ALL_MALL)
    Call<ResponseModel> getDaftarMall();

    @FormUrlEncoded
    @POST(ApiConfig.GET_PROFIL)
    Call<ResponseModel> getProfil(@Field("id_pengguna") String idPengguna);

    @FormUrlEncoded
    @POST(ApiConfig.UPDATE_PROFIL)
    Call<ResponseModel> updateProfil(@Field("id_pengguna") String idPengguna,
                                     @Field("username") String username,
                                     @Field("password") String pass,
                                     @Field("nama_pengguna") String namaPengguna,
                                     @Field("alamat") String alamat,
                                     @Field("no_hp") String noHp);

    @FormUrlEncoded
    @POST(ApiConfig.BOOK)
    Call<ResponseModel> book(@Field("id_pengguna") String idPengguna,
                             @Field("id_mall") String idMall);
}
