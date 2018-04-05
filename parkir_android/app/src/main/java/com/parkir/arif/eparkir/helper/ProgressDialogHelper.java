package com.parkir.arif.eparkir.helper;

import android.app.ProgressDialog;
import android.content.Context;
import android.support.annotation.Nullable;



public class ProgressDialogHelper {
    private ProgressDialog mDialog;
    private String judul;
    private String msg;
    private Context mContext;

    public ProgressDialogHelper(Context mContext) {
        this.msg = "";
        this.mContext = mContext;

        initDialog();
    }

    private void initDialog(){
        mDialog = new ProgressDialog(mContext);
        mDialog.setCancelable(false);
    }

    public void showDialog(@Nullable String msg){
        if(msg == null){
            msg = "Loading...";
        }
        mDialog.setMessage(msg);
        mDialog.show();
    }

    public void hide(){
        mDialog.hide();
    }
}
