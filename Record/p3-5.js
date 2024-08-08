function firstNonRepeatingCharacter(s) {
    const charCount = {};
    for (let char of s) {
        charCount[char] = (charCount[char] || 0) + 1;
    }
    for (let char of s) {
        if (charCount[char] === 1) {
            return char;
        }
    }

    return null; 
}
console.log(firstNonRepeatingCharacter("leetcode"));    
console.log(firstNonRepeatingCharacter("loveleetcode"));