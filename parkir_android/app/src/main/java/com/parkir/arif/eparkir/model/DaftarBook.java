package com.parkir.arif.eparkir.model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

/**
 * Created by anasbayu on 11/21/2017.
 */

public class DaftarBook {
    @SerializedName("list")
    private List<Book> listBook;

    public List<Book> getListBook() {
        return listBook;
    }

    public void setListBook(List<Book> listBook) {
        this.listBook = listBook;
    }
}
