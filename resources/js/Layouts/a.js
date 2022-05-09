function subsetA(arr) {
    // Write your code here
    const sorted = arr.sort((a, b) => a - b);
    const n = Math.round(sorted.length / 3);
    const A = sorted.splice(sorted.length - n, n);
    // const B = sorted.splice(0);
    return A;
    // console.log(A);
}

// console.log(subsetA([8, 9, 2, 1, 3, 5, 2, 6, 1]));

function smallestString(substrings) {
    // const subs = substrings;
    // for (let i = 0; i < subs.length; i += 1) {
    //     for (let j = 0; j < subs.length; j += 1) {
    //         console.log((subs[i] + subs[j]) > (subs[j] + subs[i]));
    //         console.log(`${subs[i] + subs[j]}--${subs[j] + subs[i]}`);
    //         if ((subs[j] + subs[i]) > (subs[i] + subs[j])) {
    //             const a = subs[i];
    //             console.log(subs[i]);
    //             subs[i] = subs[j];
    //             console.log(subs[j]);
    //             subs[j] = a;
    //             console.log(a);
    //         }
    //     }
    // }

    // let answer = '';
    // for (let k = 0; k < subs.length; k += 1) {
    //     answer += subs[k];
    // }
    // return answer;
}

// console.log(smallestString(['cc', 'accc', 'cb', 'ca']));

function plyndrome(s) {
    const text = s.split('');
    const nonChars = /[\W_]/g;
    const list = [];
    text.forEach((char) => {
        list.push(char);
    });
    for (let i = 0; i < s.length; i += 1) {
        for (let j = 0; j < s.length; j += 1) {
            const conct = s[i] + s[j];
            const originalText = conct.toLowerCase().replace(nonChars, '');
            const reverseText = originalText.split('').reverse().join('');
            if (originalText === reverseText) {
                list.push(conct);
            }
            // console.log(`${s[i]+s[j]}---${s[j]+s[i]}`);
        }
    }

    // console.log(originalText);

    // console.log(reverseText);
    // return originalText === reverseText;
    const newList = [...new Set(list)];
    return newList.length;
}

console.log(plyndrome('abbba'));
