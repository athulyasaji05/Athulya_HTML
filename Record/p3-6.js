function findMissingNumber(arr) {
    const n = arr.length; 
    let xorArray = 0;
    let xorRange = 0;
    for (let num of arr) {
        xorArray ^= num;
    }
    for (let i = 0; i <= n; i++) {
        xorRange ^= i;
    }
    return xorArray ^ xorRange;
}
const array = [0, 1, 3, 4, 5]; 
console.log(findMissingNumber(array)); 