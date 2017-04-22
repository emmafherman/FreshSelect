USE FRESHSELECT;

Select * from student;

Select * from house;

Select * from houseRequests;

/* 1. List of students who do not care what house they end up in.*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.noPreference = 'Y';



/* 2. List of Students who chose Lowrey as choice1 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 2 ;



/****Choice2****/
                                
/* 2. List of Students who chose Lowrey as choice2 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice2 = 2 ;

/******Choice3******/

/* 1. List of Students who chose Ferguson as choice3 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice3 = 8 ;


/******Choice4******/

/* 1. List of Students who chose Ferguson as choice4 */
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice4 = 8 ;

/****Requested a house at any choice****/

/* 1. List of students who requested Howard House in at least one of their choices*/
Select s.id from student s join houseRequests r on r.studentId = s.id where r.choice1 = 1 or
 r.choice2 = 1 or r.choice3 = 1 or r.choice4 = 1 ;
 


