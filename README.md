## The Mission
You will create a CRUD system to store student, teacher and class information in the database.
You do not need to provide any login for this script, everybody can change and view anything!

You will use the MVC structure provided in the [PHP MVC Boilerplate](https://github.com/becodeorg/php-mvc-boilerplate) repo provided by your coach, to help you on your way!

In this assigment you will end up with at least 3 models and 3 controllers, but you could end up with more. Model the software how you want it!

# To do:
## Database:

- Create and import the database.
- Establish  connection with the database.
- Create **MVC** structure.

## Model & Loader

- Create a model and a loader for **Class, Student, Teacher & CSV.**

- Create a search model & loader ( search by name functionality ).

## Controller:

- Create a controller for **Class, Homepage, Search, Student & Teacher.**

## View:

- Create header, footer, navigation & search bar.
- Create a homepage.
- Apply **CRUD** to classes, students & teachers.
- Apply styling and make the data displayable.

## Index:

- Require Model & Controller.

## Must-have features
You have to provide the following pages for Students, Teacher & Class.

- A general overview of all records of that entity in a table
    * Each row should have a button to edit or delete the entity
    * This page should have a "create new" button
- A detailed overview of the selected entity
    * This should include a button to delete this entity
    * Edge case: A teacher cannot be removed if he is still assigned to a class
    * Edge case: If you remove a class, make sure to remove the link between the students and the class.
- A page to edit an existing entity
- A page to create a new entity

### Fields:
On the general overview table you can yourself decide what would be useful information to show.

On the detailed overview you have to provide the following information:

#### Student
- Name
- Email
- Class (with clickable link)
- Assigned teacher (clickable link - relation via class)

#### Teacher
- Name
- Email
- List of all students currently assigned to him (clickable link)
 
#### Class 
- Name class (Giertz, Lamarr, ...)
- Location (Antwerp, Gent, Genk, Brussels, Liege)
- Assigned teacher (clickable link)
- List of assigned students (clickable link)
