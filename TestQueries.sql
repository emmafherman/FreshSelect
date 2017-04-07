USE FRESHSELECT;

Select * from student;

Select * from house;

Select * from houseRequests;

/* 1. List of students who do not care what house they end up in.*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.noPreference = 'Y';



/* 2. List of Students who chose Lowrey as choice1 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 2 ;

/* 3. List of Students who chose Howard as choice1 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 1 ;

/* 4. List of Students who chose Buck as choice1 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 3 ;

/* 5. List of Students who chose Brooks as choice1 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 4 ;

/* 6. List of Students who chose Syl-Men as choice1 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 5 ;

/* 7. List of Students who chose Syl-Women as choice1 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 6 ;

/* 8. List of Students who chose Joe as choice1 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 7 ;

/* 9. List of Students who chose Ferguson as choice1 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 8 ;


								/****Choice2****?
                                
/* 2. List of Students who chose Lowrey as choice2 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice2 = 2 ;

/* 3. List of Students who chose Howard as choice2 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice2 = 1 ;

/* 4. List of Students who chose Buck as choice2 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice2 = 3 ;

/* 5. List of Students who chose Brooks as choice2 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice2 = 4 ;

/* 6. List of Students who chose Syl-Men as choice2 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice2 = 5 ;

/* 7. List of Students who chose Syl-Women as choice2 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice2 = 6 ;

/* 8. List of Students who chose Joe as choice2 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice2 = 7 ;

/* 9. List of Students who chose Ferguson as choice2 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice2 = 8 ;


								/******Choice3******/
/* 1. List of Students who chose Ferguson as choice3 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice3 = 8 ;

/* 2. List of Students who chose Lowrey as choice3 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice3 = 2 ;

/* 3. List of Students who chose Howard as choice3 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice3 = 1 ;

/* 4. List of Students who chose Buck as choice3 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice3 = 3 ;

/* 5. List of Students who chose Brooks as choice3 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice3 = 4 ;

/* 6. List of Students who chose Syl-Men as choice3 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice3 = 5 ;

/* 7. List of Students who chose Syl-Women as choice3 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice3 = 6 ;

/* 8. List of Students who chose Joe as choice3 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice3 = 7 ;



									/******Choice4******/
/* 1. List of Students who chose Ferguson as choice4 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice4 = 8 ;

/* 2. List of Students who chose Lowrey as choice4 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice4 = 2 ;

/* 3. List of Students who chose Howard as choice4 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice4 = 1 ;

/* 4. List of Students who chose Buck as choice4 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice4 = 3 ;

/* 5. List of Students who chose Brooks as choice4 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice4 = 4 ;

/* 6. List of Students who chose Syl-Men as choice4 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice4 = 5 ;

/* 7. List of Students who chose Syl-Women as choice4 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice4 = 6 ;

/* 8. List of Students who chose Joe as choice4 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice4 = 7 ;

								/****Requested a house at any choice****/

/* 1. List of students who requested Howard House in at least one of their choices*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 1 or
 r.choice2 = 1 or r.choice3 = 1 or r.choice4 = 1 ;
 
 /* 2. List of students who requested Lowrey House in at least one of their choices*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 2 or
 r.choice2 = 2 or r.choice3 = 2 or r.choice4 = 2 ;
 
 /* 3. List of students who requested Buck House in at least one of their choices*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 3 or
 r.choice2 = 3 or r.choice3 = 3 or r.choice4 = 3 ;

/* 4. List of students who requested Brooks House in at least one of their choices*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 4 or
 r.choice2 = 4 or r.choice3 = 4 or r.choice4 = 4 ;

/* 5. List of students who requested Syl-Men House in at least one of their choices*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 5 or
 r.choice2 = 5 or r.choice3 = 5 or r.choice4 = 5 ;

/* 6. List of students who requested Syl-Women House in at least one of their choices*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 6 or
 r.choice2 = 6 or r.choice3 = 6 or r.choice4 = 6 ;

/* 7. List of students who requested Joe House in at least one of their choices*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 7 or
 r.choice2 = 7 or r.choice3 = 7 or r.choice4 = 7 ;

/* 8. List of students who requested Ferguson House in at least one of their choices*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 8 or
 r.choice2 = 8 or r.choice3 = 8 or r.choice4 = 8 ;




