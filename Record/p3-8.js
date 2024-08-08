function sumNestedArray(arr) {
    let sum = 0;
    function sumArray(array) {
        for (let item of array) {
            if (Array.isArray(item)) {
                sumArray(item);
            } else if (typeof item === 'number') {
                sum += item;
            }
        }
    }
    sumArray(arr);
    return sum;
}
const nestedArray1 = [1, [2, 3], [4, [5, 6]]];
console.log(sumNestedArray(nestedArray1));