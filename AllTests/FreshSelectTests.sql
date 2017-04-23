#These tests would be ran after the students have been sorted into their houses.

#List all male students

SELECT firstName, lastName FROM Person P
JOIN Student S on P.prinID = S.PrinID
WHERE gender = 'M';

#Select the students in Lowrey

SELECT firstName, lastName FROM Person P
JOIN Student S on P.prinID = S.PrinID
WHERE upperHouse = 2;

#Select the students that got into brooks and brooks was their first choice.

SELECT firstName, lastName FROM Person P
JOIN Student S ON P.prinID = S.PrinID
WHERE upperHouse = 4 and preference = 1;

#List all student's who got their first pick.

SELECT firstName, lastName, upperHouse FROM Person P
JOIN Student S ON P.prinID = S.PrinID
WHERE preference = 1;

#List all student's who got their secpnd pick.

SELECT firstName, lastName, upperHouse FROM Person P
JOIN Student S ON P.prinID = S.PrinID
WHERE preference = 2;

#List all student's who did not have a preference.

SELECT firstName, lastName, upperHouse FROM Person P
JOIN Student S ON P.prinID = S.PrinID
WHERE preference = 5;

#List all female student's who got their first pick.

SELECT firstName, lastName, upperHouse FROM Person P
JOIN Student S ON P.prinID = S.PrinID
WHERE preference = 1 and gender = 'F';

#List all male student's who got their first pick.

SELECT firstName, lastName, upperHouse FROM Person P
JOIN Student S ON P.prinID = S.PrinID
WHERE preference = 1 and gender = 'M';

#List all people with admin permission

SELECT firstName, lastName from Person
WHERE permission = 'Y';

#List all people with out admin permission

SELECT firstName, lastName from Person
WHERE permission = 'N';

#List all the students who have submitted at least one selection form.

SELECT firstName, lastName FROM Person P
JOIN Student S ON P.prinID = S.PrinID
JOIN SelectionXStudent SXS on S.prinID = SXS.PrinID
GROUP BY S.prinID
HAVING COUNT(SXS.PrinID) = 1;


