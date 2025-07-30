#1
CREATE VIEW view_course_student_count AS
SELECT c.title, COUNT(e.student_id) AS total
FROM courses c
LEFT JOIN enrollments e ON c.id = e.course_id
GROUP BY c.id;

#2
CREATE VIEW view_least_enrolled_student AS
SELECT name
FROM students
WHERE id = (
    SELECT student_id
    FROM enrollments
    GROUP BY student_id
    ORDER BY COUNT(*) ASC
    LIMIT 1
);

#3
CREATE VIEW view_students_not_many_courses AS
SELECT name
FROM students
WHERE id NOT IN (
    SELECT student_id
    FROM enrollments
    GROUP BY student_id
    HAVING COUNT(*) > 1
);

#4
CREATE VIEW view_student_course_count AS
SELECT students.name, COUNT(enrollments.course_id) AS course_count
FROM students
JOIN enrollments ON students.id = enrollments.student_id
GROUP BY students.name;
