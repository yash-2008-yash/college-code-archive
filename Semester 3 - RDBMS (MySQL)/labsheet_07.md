# LABSHEET 7: Write SQL queries to perform set operations (UNION, INTERSECT, EXCEPT)

**AIM:** To write and execute SQL queries using `UNION`, `INTERSECT`, and `EXCEPT` set operations to combine and compare data from two tables.

<br>

## 1. Theory

Set operations are used to combine the results of two or more `SELECT` queries.

| Operator | Purpose |
|---|---|
| `UNION` | Combines the results of two queries and removes duplicate rows |
| `INTERSECT` | Returns only the common rows present in both queries |
| `EXCEPT` | Returns rows from the first query that are not present in the second query |

> **Note:** Both `SELECT` statements must have the same number of columns with compatible data types.

<br>

## 2. Create Table 1: `CSE_Students`

```sql
CREATE TABLE CSE_Students (
    student_id INT,
    student_name VARCHAR(50)
);
```

**Output:** Table created successfully.

<br>

## 3. Create Table 2: `ISE_Students`

```sql
CREATE TABLE ISE_Students (
    student_id INT,
    student_name VARCHAR(50)
);
```

**Output:** Table created successfully.

<br>

## 4. Insert Records

### Insert into `CSE_Students`

```sql
INSERT INTO CSE_Students
(student_id, student_name)
VALUES
(101, 'Ananya'),
(102, 'Rahul'),
(103, 'Priya');
```

### Insert into `ISE_Students`

```sql
INSERT INTO ISE_Students
(student_id, student_name)
VALUES
(102, 'Rahul'),
(103, 'Priya'),
(104, 'Kiran');
```

**Output:** 3 rows inserted successfully into each table.

### CSE_Students Table

```
+------------+--------------+
| student_id | student_name |
+------------+--------------+
|        101 | Ananya       |
|        102 | Rahul        |
|        103 | Priya        |
+------------+--------------+
```

### ISE_Students Table

```
+------------+--------------+
| student_id | student_name |
+------------+--------------+
|        102 | Rahul        |
|        103 | Priya        |
|        104 | Kiran        |
+------------+--------------+
```

<br>

## 5. UNION Operation

Displays all unique students from both tables.

**SQL Query**

```sql
SELECT * FROM CSE_Students
UNION
SELECT * FROM ISE_Students;
```

**Output**

```
+------------+--------------+
| student_id | student_name |
+------------+--------------+
|        101 | Ananya       |
|        102 | Rahul        |
|        103 | Priya        |
|        104 | Kiran        |
+------------+--------------+
```

**Explanation:** `UNION` combines the results of both tables and removes duplicate rows.

<br>

## 6. INTERSECT Operation

Displays students common to both tables.

**SQL Query**

```sql
SELECT * FROM CSE_Students
INTERSECT
SELECT * FROM ISE_Students;
```

**Output**

```
+------------+--------------+
| student_id | student_name |
+------------+--------------+
|        102 | Rahul        |
|        103 | Priya        |
+------------+--------------+
```

<br>

## 7. EXCEPT Operation

Displays students present in `CSE_Students` but not in `ISE_Students`.

**SQL Query**

```sql
SELECT * FROM CSE_Students
EXCEPT
SELECT * FROM ISE_Students;
```

**Output**

```
+------------+--------------+
| student_id | student_name |
+------------+--------------+
|        101 | Ananya       |
+------------+--------------+
```

**Explanation:** `EXCEPT` returns rows from the first query that do not exist in the second query.

---