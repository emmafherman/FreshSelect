package HouseSorting Algorithm;
import java.util.*;
import org.junit.*;

/**
 * Created by emma on 4/7/17.
 */
public class SortingAlgorithm {
    public static void main(String[] args) {
        public final Vector<String> house1 = new Vector<String>(); //Howard
        public final Vector<String> house2 = new Vector<String>(); //Lowrey
        public final Vector<String> house3 = new Vector<String>(); //Buck
        public final Vector<String> house4 = new Vector<String>(); //Brooks
        public final Vector<String> house5 = new Vector<String>(); //Syl-Men
        public final Vector<String> house6 = new Vector<String>(); //Syl-Women
        public final Vector<String> house7 = new Vector<String>(); //Ferguson
        public final Vector<String> house8 = new Vector<String>(); //Anderson
        public final Vector<String> house9 = new Vector<String>(); //Rackham

    }

    public Vector<String> addChoices(Vector<String> student, Vector<Vector>
            tosort, int choice1, int choice2, int choice3, int choice4,
                                     int choiceAny) {
        student.add(choice1);
        student.add(choice2);
        student.add(choice3);
        student.add(choice4);
        student.add(choiceAny);
        student.add(selectionNum);

        tosort.add(student);
        return student; //idk if needed
    }

    public void sortStudent(Vector<string> student, int num[]){
        //sort houses by number of spots available
        int sorted;           //the number of items sorted so far
        int current;          //the item to be sorted
        int i;                //index

        for (sorted = 1; sorted < num.length; sorted++)  //start with 1 (not 0)
        {
            current = num[sorted];
            for(i = sorted - 1; (i >= 0) && (num[i] < key); i--)   // Smaller values are moving up
            {
                num[i+1] = num[i];
            }
            num[i+1] = key;    //Put the key in its proper location
        }


    }

    public Vector<String> placeInHouse(String houseNum, Vector<String> student,
                                       int choiceNum){
        houseNum.add(student);
    }

    public Vector<String> updateSpotsAvail(Vector<String> house, int spots){
        house.add(spots);
    }

    public Vector<String> placeInHouse(String houseNum, Vector<String> student,
                                       int choiceNum){
        houseNum.add(student);
    }

    public int[] sortHousesByAvail(Vector<String> houses){

        int[] spotsAvail = new int[];

        for(int i = 0; i < houses.length; i++){

            //sort houses by number of spots available
            int sorted, i;   //num of sorted, index
            Vector<String> curr = Vector<String>;

        for (sorted = 1; sorted < houses.size(); sorted++) //start with 1 (not 0)
        {
            curr = houses.elementAt().getElementAt(sorted); //EMMA YOU LEFT OFF HERE
            for(i = sorted - 1; (i >= 0) && (houses.get(i) < curr); i--) //smaller move up
            {
                houses.get(i+1) = houses.get(i);
            }
            houses.get(i+1) = curr;    //place current house in its proper location
        }
    }

}