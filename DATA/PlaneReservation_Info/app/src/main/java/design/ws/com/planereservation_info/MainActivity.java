package design.ws.com.planereservation_info;


import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.Spinner;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    String t;
    LinearLayout city1;
    LinearLayout city2;
    ImageView btn;
    TextView title1,subtitle1,title2,subtitle2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        t= ""+1;
        Spinner staticSpinner = (Spinner) findViewById(R.id.static_spinner);

        // Create an ArrayAdapter using the string array and a default spinner
        ArrayAdapter<CharSequence> staticAdapter = ArrayAdapter
                .createFromResource(this, R.array.brew_array,
                        android.R.layout.simple_spinner_item);

        // Specify the layout to use when the list of choices appears
        staticAdapter
                .setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        // Apply the adapter to the spinner
        staticSpinner.setAdapter(staticAdapter);





//        Spinner dynamicSpinner = (Spinner) findViewById(R.id.dynamic_spinner);

        String[] items = new String[] { "Chai Latte", "Green Tea", "Black Tea" };

        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,
                android.R.layout.simple_spinner_item, items);





        LinearLayout city1 = (LinearLayout) findViewById(R.id.city1);
        LinearLayout city2 = (LinearLayout) findViewById(R.id.city2);

        title1 = (TextView) findViewById(R.id.title1);
        subtitle1 = (TextView) findViewById(R.id.subtitle1);
        title2 = (TextView) findViewById(R.id.title2);
        subtitle2 = (TextView) findViewById(R.id.subtitle2);

        city1 = (LinearLayout)findViewById(R.id.city1);
        city2 = (LinearLayout)findViewById(R.id.city2);
        btn=(ImageView)findViewById(R.id.btn);


        final LinearLayout finalCity = city1;
        final LinearLayout finalCity1 = city2;
        ImageView updown;
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                if(t.equalsIgnoreCase("1")) {

                    title1.setText("SALBURG");
                    subtitle1.setText("Pulkovo1, Russia1");
                    title2.setText("SAINT PITERSBUG");
                    subtitle2.setText("Pulkovo, Russia");

                    t=""+2;
                }
                else{

                    title1 .setText("SAINT PITERSBUG");
                    subtitle1 .setText("Pulkovo, Russia");
                    title2 .setText("SALBURG");
                    subtitle2 .setText("Pulkovo1, Russia1");
                    t=""+1;



                }

            }
        });






    }
}