# Smeedish

Smeedish is a fictional ancient encryption method designed for secure encryption (by 1600s standards) that can be applied to almost any language.

This repository provides tools for encrypting raw text into cipher text (also known as 'smeedish'). Currently, it only supports languages that are read from left to right, with testing primarily conducted on English.

The algorithm for encryption is straightforward. No private exchange of keys is necessary—possession of the tool is sufficient for end-to-end encryption.

## Encryption Algorithm

The Smeedish encryption algorithm is designed to be simple yet effective. Here’s a breakdown of the encryption process:

### Steps for Encryption:

1. **Single-Word Input**: If the input consists of only one word, the standard rules for spacing and character removal can be omitted. You can directly encrypt the single word.

2. **Multi-Word Input**: For text containing two or more words, follow these standard encryption rules:
   - **Remove Non-Lowercase Letters**: Filter the input text to keep only lowercase letters (a-z).
   - **Strip Whitespace**: Remove all but one whitespace between words.
   - **Random Character Insertion**: Introduce random characters into the text at predetermined intervals to increase complexity.
   - **Transform the Text**: Apply specific transformation rules to the text. This can include:
     - Replacing certain letters with symbols.
     - Shifting positions of letters.
   - **Output the Cipher Text**: The resulting string is your encrypted text, or "smeedish".

### Example of the Encryption Process:

#### Single-Word Example:
1. Original Text: `hello`
2. Encrypted Text: (e.g., `h3E#lL2o`)

#### Multi-Word Example:
1. Original Text: `hello world`
2. After applying rules:
   - Remove non-lowercase letters: `hello world`
   - Strip whitespace: `hello world`
   - Insert random characters: `h2e@ll#o w4o#rld`
   - Transform (example): `h3E#lL2 ow4O#rL d6`

Encrypted Text: `h3E#lL2 ow4O#rL d6`

**Note**: The specific transformation rules and character insertion methods can be customized as needed.

## Usage

To encrypt text using Smeedish, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/smeedish.git
   ```
   
2. Navigate to the project directory:
   ```bash
   cd smeedish
   ```

3. Use the provided tools to encrypt your text. For example:
   ```bash
   python encrypt.py "your text here"
   ```

### Requirements

- Python 3.x
- Any necessary libraries (specify them if applicable)

## Contribution

We welcome contributions! If you'd like to improve the Smeedish tool or propose new features, please fork the repository and submit a pull request.

## License

(If you have a specific license for your project, include that information here.)

---

### Conclusion

The README now accurately reflects the encryption rules for both single-word and multi-word inputs, ensuring clarity for users. If you have any further adjustments or additions, just let me know!
