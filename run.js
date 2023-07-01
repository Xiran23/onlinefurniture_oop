var a = [1,2,3,4,5,6,7,80,9,10]; 
maxvalue = a[0]; 


for(let i = 1 ; i <a.length;i++){
    if(maxvalue < a[i]){
        maxvalue = a[i];
    }
}

console.log(maxvalue);
// a.sort(function arrange(a,b) {
//     return a - b ;
    
// });
// console.log(a.length);

// console.log(a[9]);

// for(let i = 1 ; i=a.length - 1 ;i++ ){
//     console.log(a[i]);

// }
// a.sort();

console.log(a.length);

