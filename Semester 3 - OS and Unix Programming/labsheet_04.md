# Experiment 4 - Programs using the following system calls of UNIX operating system `close`, `stat`, `opendir`, `readdir`

- **opendir(path)**: Opens a directory and returns a `DIR *` handle. It returns `NULL` if it fails.
- **readdir(dir)**: Each call gives the next entry in that directory (a `struct dirent`, where `d_name` is the file name). It returns `NULL` when there are no more entries.
- **stat(path, &buf)**: Fills a `struct stat` with info about a file: size (`st_size`), type and permissions (`st_mode`). It returns `-1` on error.
- **close(fd)**: Closes a file descriptor you got from `open()`.

`exp_4.c`
```c
#include <stdio.h>
#include <stdlib.h>
#include <dirent.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <unistd.h>

int main() {
    DIR *dir = opendir(".");  // open current directory
    if (dir == NULL) {
        perror("opendir");
        exit(1);
    }

    struct dirent *entry;
    struct stat info;

    while ((entry = readdir(dir)) != NULL) {      // read one entry at a time
        if (stat(entry->d_name, &info) == -1) {   // get file info
            perror("stat");
            continue;
        }

        if (S_ISREG(info.st_mode)) {
            int fd = open(entry->d_name, O_RDONLY);   // open the file
            if (fd != -1) {
                printf("%-25s %ld bytes\n", entry->d_name, (long)info.st_size);
                close(fd);                            // close the file
            }
        } else if (S_ISDIR(info.st_mode)) {           // directory
            printf("%-25s [directory]\n", entry->d_name);
        }
    }

    closedir(dir);    // close the directory
    return 0;
}
```

To run this file:
```
gcc exp_4.c -o exp_4 && ./exp_4
```

OUTPUT:
```
.                         [directory]
..                        [directory]
a.out                     16344 bytes
main.c                    1136 bytes
```