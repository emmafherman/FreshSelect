package SortingAlgorithm;
import java.util.*;
import org.junit.*;

/**
 * Created by emma on 4/7/17.
 */
public class SortingTest {

    /**
     * Check to make sure students are being generated correctly.
     */

        // make sure its a Vector class
        @Test
        public void initilize(){
            Vector<String> student1 = new Vector<String>();
            Assert.assertTrue(student1 instanceof Vector);
        }

        @Test // checks the student vector is empty.
        public void newStudentTest() {
            Vector<String> student1 = new Vector<String>(5);
            int i = 0;
            while (i <= 5) {
                Assert.assertTrue(student1.get(i).equals(0));
                i++;
            }
        }

        // get methods for student vector
        @Test
        public void getChoicesTests(){
            Vector<String> student1 = new Vector<String>(5);
            student1.add("Howard");
            student1.add("Brooks");
            student1.add("Joe");
            student1.add("Syl-F");
            student1.add("0");

            Assert.assertTrue(student1.getFirst() == "Howard");   //First
            Assert.assertTrue(student1.getSecond() == "Brooks");  //Second
            Assert.assertTrue(student1.getThird() == "Joe");      //Third
            Assert.assertTrue(student1.getFourth() == "Syle-F");  //Fourth
            Assert.assertTrue(student1.getAny() == "0");          //Any
        }

        // tests House Vector - adds students to house vectors
        @Test
        public void houseVectorsTest(){
            howard.isEmpty();
            howard.add("P0123456");
            howard.add("P0122222");

            Assert.fail(joe.add("P0123456"));     // one person to one house
            Assert.assertTrue(howard.firstElement() == "P0123456");
            Assert.assertTrue(howard.size() == "2");
        }

        // adjusts the spots available when someone is added
        @Test
        public void spotsAvailable(){
            Assert.assertTrue(getAvailable(kBuck) == 0);
            buck.add("P0555555");
            Assert.assertTrue(getAvailable(kBuck) == 1);
        }

        // removing a specific person
        @Test
        public void removeStudent(){
            howard.add("P0188888");
            Assert.assertTrue(howard.contains("P0188888"));

            howard.removeStudent("P0188888");
            Assert.assertFalse(howard.contains("P0188888"));
        }
    }