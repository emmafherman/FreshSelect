package HouseSorting

Algorithm;
        import java.util.*;
        import org.junit.*;

/**
 * Created by emma on 4/7/17.
 */
public class SortingAlgorithm {
    public static void main(String[] args) {
        public final Vector<String> 1 = new Vector<String>(); //Howard
        public final Vector<String> 2 = new Vector<String>(); //Lowrey
        public final Vector<String> 3 = new Vector<String>(); //Buck
        public final Vector<String> 4 = new Vector<String>(); //Brooks
        public final Vector<String> 5 = new Vector<String>(); //Syl-Men
        public final Vector<String> 6 = new Vector<String>(); //Syl-Women
        public final Vector<String> 7 = new Vector<String>(); //Joe
        public final Vector<String> 8 = new Vector<String>(); //Ferg
        public final Vector<String> 9 = new Vector<String>(); //Anderson
        public final Vector<String> 10 = new Vector<String>(); //Rackham
        public final Vector<Vector> allHouses = new Vector<Vector>(); //all
        public final Vector<Vector> toSort = new Vector<Vector>(); //freshies
        //add choices to each student
        //once you have the number of spots available for each house...
        updateSpotsAvail(house1, 12); //example - need to do for each - will updates allHouses vector
        package HouseSorting Algorithm;
        import java.util. *;
        import org.junit. *;

/**
 * Created by emma on 4/7/17.
 */
        public class SortingAlgorithm {
            public static void main(String[] args) {
                public final Vector<String> 1 = new Vector<String>(); //Howard
                public final Vector<String> 2 = new Vector<String>(); //Lowrey
                public final Vector<String> 3 = new Vector<String>(); //Buck
                public final Vector<String> 4 = new Vector<String>(); //Brooks
                public final Vector<String> 5 = new Vector<String>(); //Syl-Men
                public final Vector<String>
                6 = new Vector<String>(); //Syl-Women
                public final Vector<String> 7 = new Vector<String>(); //Joe
                public final Vector<String> 8 = new Vector<String>(); //Ferg
                public final Vector<String> 9 = new Vector<String>(); //Anderson
                public final Vector<String> 10 = new Vector<String>(); //Rackham
                public final Vector<Vector> allHouses = new Vector<Vector>(); //all
                public final Vector<Vector> toSort = new Vector<Vector>(); //freshies
                //add choices to each student
                //once you have the number of spots available for each house...
                updateSpotsAvail(house1, 12); //example - need to do for each - will updates allHouses vector

                allHouses = sortHousesByAvail(allHouses); //sorts houses in decending order

                for (int i = 0; i < allHouses.size(); i++) {

                    Vector<Vector> houseToFill = allHouses.get(i);
                    String curr = (String) houseToFill;
                    int houseNum = (int) curr.charAt(curr.length() - 1); //only the number of the house
                    house + houseNum = fillHouse(houseNum, houseToFill);
                }

            }

            public Vector<int> addChoices(Vector<int> student, int choice1,
                                          int choice2, int choice3, int choice4,
                                          int choiceAny) {
                student.add(choice1);
                student.add(choice2);
                student.add(choice3);
                student.add(choice4);
                student.add(choiceAny);
                student.add(selectionNum);
                toSort.add(student);
                return student; //idk if needed
            }

            public Vector<Vector> fillHouse(int houseNumber, Vector<Vector> currHouse) {

                for (int choice = 1; choice < 5; choice++) {
                    for (int i = 0; i < toSort.size(); i++) {
                        //people who has this house as the right choice and if the house isn't full
                        if (toSort.get(i).get(choice) == houseNumber && currHouse.get(1) < 0) {
                            currHouse.add(toSort.get(i));
                            toSort.remove(i);
                            i--; //after removing the student, they are no longer there to sort
                        } else if (currHouse.get(1) = 0) {//if there is not more space in house
                            return currHouse;
                        } else {
                            continue;
                        } //go to next person
                    }
                }
                return currHouse;
            }

            public Vector<String> updateSpotsAvail(Vector<String> house, int spots) {
                house.add(spots);
                allHouses.add(house);
            }

            //public Vector<String> placeInHouse(String houseNum, Vector<String> student,
            //                                   int choiceNum){
            //    houseNum.add(student);
            //}

            //
            public Vector<Vector> sortHousesByAvail(Vector<Vector> houses) {
                //sort houses by number of spots available
                int sorted, curr, i;   //num of sorted, index

                for (int i = 0; i < houses.size(); i++) {

                    for (sorted = 1; sorted < houses.size(); sorted++) //start with 1 (not 0)
                    {
                        curr = houses.elementAt(sorted).getElementAt(1);
                        for (i = sorted - 1; (i >= 0) && (houses.elementAt(sorted).getElementAt(i) < curr); i--) //smaller move up
                        {
                            houses.get(i + 1) = houses.get(i);
                        }
                        houses.get(i + 1) = curr;    //place current house in its proper location
                    }
                }
            }

            allHouses=

            sortHousesByAvail(allHouses); //sorts houses in decending order

            for(
            int i = 0;
            i<allHouses.size();i++)

            {

                Vector<Vector> houseToFill = allHouses.get(i);
                String curr = (String) houseToFill;
                int houseNum = (int) curr.charAt(curr.length() - 1); //only the number of the house
                house + houseNum = fillHouse(houseNum, houseToFill);
            }

        }

        public Vector<int> addChoices (Vector <int>student,int choice1,
        int choice2, int choice3, int choice4,
        int choiceAny){
            student.add(choice1);
            student.add(choice2);
            student.add(choice3);
            student.add(choice4);
            student.add(choiceAny);
            student.add(selectionNum);
            toSort.add(student);
            return student; //idk if needed
        }

        public Vector<Vector> fillHouse ( int houseNumber, Vector<
        Vector > currHouse){

            for (int choice = 1; choice < 5; choice++) {
                for (int i = 0; i < toSort.size(); i++) {
                    //people who has this house as the right choice and if the house isn't full
                    if (toSort.get(i).get(choice) == houseNumber && currHouse.get(1) < 0) {
                        currHouse.add(toSort.get(i));
                        toSort.remove(i);
                        i--; //after removing the student, they are no longer there to sort
                    } else if (currHouse.get(1) = 0) {//if there is not more space in house
                        return currHouse;
                    } else {
                        continue;
                    } //go to next person
                }
            }
            return currHouse;
        }

        public Vector<String> updateSpotsAvail (Vector < String > house,
        int spots){
            house.add(spots);
            allHouses.add(house);
        }

        //public Vector<String> placeInHouse(String houseNum, Vector<String> student,
        //                                   int choiceNum){
        //    houseNum.add(student);
        //}

        //
        public Vector<Vector> sortHousesByAvail (Vector < Vector > houses) {
            //sort houses by number of spots available
            int sorted, curr, i;   //num of sorted, index

            for (int i = 0; i < houses.size(); i++) {

                for (sorted = 1; sorted < houses.size(); sorted++) //start with 1 (not 0)
                {
                    curr = houses.elementAt(sorted).getElementAt(1);
                    for (i = sorted - 1; (i >= 0) && (houses.elementAt(sorted).getElementAt(i) < curr); i--) //smaller move up
                    {
                        houses.get(i + 1) = houses.get(i);
                    }
                    houses.get(i + 1) = curr;    //place current house in its proper location
                }
            }
        }