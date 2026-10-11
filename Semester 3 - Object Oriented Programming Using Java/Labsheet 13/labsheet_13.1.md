# Experiment 13.1 - Demonstration of File Input/Output

Write a Java program to perform file writing and reading operations.

The program should:

- Take the file name and content as input from the user.
- Write the content into the specified file.
- After successful writing, read the content back from the file.
- Print the confirmation message and display the file content.

---

### Input Format

- The first line contains the file name (string).
- The second line contains a single string which include spaces.

### Output Format

- If the file writing is successful, print:

```
File Written
File Content: <content>
```

- If writing fails:

```
File Write Failed
```

**Note:**

- The driver code handles input and output. You need to implement the logic to write the given content to the specified file.

### Example

```
test.txt
Hello world

File Written
File Content: Hello world
```

```
data.txt
File Handling

File Written
File Content: File Handling
```

---

### Solution Code

```java
import java.io.FileWriter;
import java.io.FileReader;
import java.io.IOException;
import java.util.Scanner;

public class WriteFile {
	// throws IOException: tells Java that main() may throw an I/O error that is not handled by the method itself
	public static void main(String[] args) throws IOException {
		Scanner sc = new Scanner(System.in);

		// Input: read file name and content from user
		// nextLine() is used so the content can contain spaces, e.g. "Hello world"
		String fileName = sc.nextLine();
		String content = sc.nextLine();
		sc.close();   // input is finished, so close the Scanner

		try {
			// ---------- WRITING ----------
			// FileWriter creates the file (or overwrites it if it already exists)
			FileWriter writer = new FileWriter(fileName);
			writer.write(content);   // write the text into the file
			writer.close();          // close to flush the data and save the file properly

			System.out.println("File Written");

			// ---------- READING BACK ----------
			// FileReader opens the same file for reading, one character at a time
			FileReader reader = new FileReader(fileName);

			// StringBuilder collects the characters into one String efficiently
			StringBuilder fileData = new StringBuilder();

			int ch;   // read() returns an int: the character code, or -1 at the end of the file

			// read one character at a time until read() returns -1 (end of file)
			while ((ch = reader.read()) != -1) {
				fileData.append((char) ch);   // cast the int code back to a char and add it
			}

			reader.close();   // release the file after reading

			// print the text that was read back from the file
			System.out.println("File Content: " + fileData.toString());

		} catch (IOException e) {
			// runs if writing or reading fails (e.g. invalid path or no permission)
			System.out.println("File Write Failed");
		}
	}
}
```