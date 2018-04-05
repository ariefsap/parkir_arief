package com.parkir.arif.eparkir.network;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;


public class ApiClient {
    private static Retrofit retrofit;

    private static Retrofit buatClient(){
        retrofit = new Retrofit.Builder().baseUrl(ApiConfig.BASE_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();

        return retrofit;
    }

    public static ApiInterface buatRequest(){
        return buatClient().create(ApiInterface.class);
    }
}
