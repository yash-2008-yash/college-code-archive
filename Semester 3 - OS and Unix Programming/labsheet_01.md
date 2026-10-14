# Basic UNIX Commands and various UNIX editors such as vi

- ### `pwd`

  Prints the current working directory

  ```
  > pwd
  /home/yashwanth-m
  ```

<br>

- ### `ls`

  Lists out the contents inside the current directory

  **NOTE:** `-l -a` will provide a detailed info

  ```
  > ls -l -a
  total 788
  drwxr-x--- 36 yashwanth-m yashwanth-m   4096 Oct 14 20:27 .
  drwxr-xr-x  3 root        root          4096 Oct 23  2025 ..
  -rw-rw-r--  1 yashwanth-m yashwanth-m    140 Dec 11  2025 .apport-ignore.xml
  drwxrwxr-x  7 yashwanth-m yashwanth-m   4096 Apr 14  2026 .cursor
  drwxr-xr-x  2 yashwanth-m yashwanth-m   4096 Jun 29 21:27 Desktop
  drwxr-xr-x  3 yashwanth-m yashwanth-m   4096 Oct 14 20:18 Downloads
  ...
  ```

<br>

- ### `cd`
  
  Changes the working directory

  ```
  > cd Downloads

  ~/Downloads
  > 
  ```

<br>

- ### `whoami`

  Displays the current user

  ```
  > whoami
  yashwanth-m
  ```

<br>

- ### `date`
  
  Displays system date and time
  
  ```
  > date
  Wed Oct 14 08:38:15 PM IST 2026
  ```

<br>

- ### `cal`

  Displays the calendar of the given year

  ```
  > cal 2026
                              2026
        January               February               March          
  Su Mo Tu We Th Fr Sa  Su Mo Tu We Th Fr Sa  Su Mo Tu We Th Fr Sa  
              1  2  3   1  2  3  4  5  6  7   1  2  3  4  5  6  7  
  4  5  6  7  8  9 10   8  9 10 11 12 13 14   8  9 10 11 12 13 14  
  11 12 13 14 15 16 17  15 16 17 18 19 20 21  15 16 17 18 19 20 21  
  18 19 20 21 22 23 24  22 23 24 25 26 27 28  22 23 24 25 26 27 28  
  25 26 27 28 29 30 31                        29 30 31              
                                                                    

        April                  May                   June          
  Su Mo Tu We Th Fr Sa  Su Mo Tu We Th Fr Sa  Su Mo Tu We Th Fr Sa  
            1  2  3  4                  1  2      1  2  3  4  5  6  
  5  6  7  8  9 10 11   3  4  5  6  7  8  9   7  8  9 10 11 12 13  
  12 13 14 15 16 17 18  10 11 12 13 14 15 16  14 15 16 17 18 19 20  
  19 20 21 22 23 24 25  17 18 19 20 21 22 23  21 22 23 24 25 26 27  
  26 27 28 29 30        24 25 26 27 28 29 30  28 29 30              
                        31                                          

          July                 August              September        
  Su Mo Tu We Th Fr Sa  Su Mo Tu We Th Fr Sa  Su Mo Tu We Th Fr Sa  
            1  2  3  4                     1         1  2  3  4  5  
  5  6  7  8  9 10 11   2  3  4  5  6  7  8   6  7  8  9 10 11 12  
  12 13 14 15 16 17 18   9 10 11 12 13 14 15  13 14 15 16 17 18 19  
  19 20 21 22 23 24 25  16 17 18 19 20 21 22  20 21 22 23 24 25 26  
  26 27 28 29 30 31     23 24 25 26 27 28 29  27 28 29 30           
                        30 31                                       

        October               November              December        
  Su Mo Tu We Th Fr Sa  Su Mo Tu We Th Fr Sa  Su Mo Tu We Th Fr Sa  
              1  2  3   1  2  3  4  5  6  7         1  2  3  4  5  
  4  5  6  7  8  9 10   8  9 10 11 12 13 14   6  7  8  9 10 11 12  
  11 12 13 14 15 16 17  15 16 17 18 19 20 21  13 14 15 16 17 18 19  
  18 19 20 21 22 23 24  22 23 24 25 26 27 28  20 21 22 23 24 25 26  
  25 26 27 28 29 30 31  29 30                 27 28 29 30 31      
  ```

<br>

- ### `man`

  Displays the manual page of a command

  ```
  > man ls

  LS(1)                            User Commands                           LS(1)

  NAME
        ls - list directory contents

  SYNOPSIS
        ls [OPTION]... [FILE]...

  DESCRIPTION
        List  information  about  the FILEs (the current directory by default).
        Sort entries alphabetically if none of -cftuvSUX nor --sort  is  speci‐
        fied.

        Mandatory  arguments  to  long  options are mandatory for short options
        too.

        -a, --all
                do not ignore entries starting with .

        -A, --almost-all
                do not list implied . and ..
        
        ...
  ```

<br>

- ### `nano`

  This is also an UNIX editor.   
  After editing, `Ctrl + O` and `Ctrl + X` to exit.

  ```
  > nano demo.txt

  // Editing the file, then Ctrl + O and Ctrl + X
  ```
  ```
  > cat demo.txt
  Hello, I am Yashwanth M.
  Ummm... I don't know what to say :)
  Have a nice dayyyyy!
  ```

<br>

- ### `vi`

  One of the worst UNIX editor imo.
  
  To get a newline, press `o` before starting editing.  
  First, press `i` for start editing.  
  To save and quit, `esc` and `:wq`  
  To quit without saving, `esc` and `:q!`

  ```
  > vi demo.txt

  // Editing the file, then esc and :wq
  ```
  ```
  > cat demo.txt
  Hello, I am Yashwanth M.
  Ummm... I don't know what to say :)
  Have a nice dayyyyy!
  VI Editor is bullsh*t!!!
  ```

<br>

- ### `clear`

  Clears the terminal and gives a fresh one.

<br>

- ### `exit`

  Exits the terminal