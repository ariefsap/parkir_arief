package com.parkir.arif.eparkir.model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

/**
 * Created by anasbayu on 11/21/2017.
 */

public class DaftarMall {
    @SerializedName("list")
    private List<Mall> listMall;

    public List<Mall> getListMall() {
        return listMall;
    }

    public void setListMall(List<Mall> listMall) {
        this.listMall = listMall;
    }
}
