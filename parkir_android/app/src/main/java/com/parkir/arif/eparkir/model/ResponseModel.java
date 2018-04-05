package com.parkir.arif.eparkir.model;

import com.google.gson.JsonObject;


public class ResponseModel {
    private Boolean status;
    private String pesan;
    private JsonObject data;


    public Boolean getStatus() {
        return status;
    }

    public String getPesan() {
        return pesan;
    }

    public JsonObject getData(){
        return data;
    }
}
