function intersectArrays(arr1, arr2) {
    const set1 = new Set(arr1);
    return arr2.filter(item => set1.has(item));
}
const array1 = [1, 2, 3, 4, 5];
const array2 = [4, 5, 6, 7, 8];
console.log(intersectArrays(array1, array2)); 