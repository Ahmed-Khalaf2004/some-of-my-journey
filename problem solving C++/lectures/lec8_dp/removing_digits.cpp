// #include <iostream>
// #include <vector>
// #include <algorithm>
// #include <string>

// using namespace std;

// void solve()
// {
//     int num;
//     cin>>num;
//     int cot(0);
//     int mx(0);
//     while(num){
//         int n = num;
//         while(n){
//             n = num%10;
//             mx = max(n,mx);
//             n/=10;
//         }    
//         num-=mx;
//         cot+=1;
//         if(num<0)break;
// }
// cout<<cot<<endl;

// }

// int main()
// {
//     ios_base::sync_with_stdio(false);
//     cin.tie(NULL);
//     solve();
//     return 0;
// }


#include <iostream>
#include <algorithm>

using namespace std;

void solve() {
    int num;
    cin >> num;

    int count = 0;

    while (num > 0) {
        int temp = num;
        int maxDigit = 0;

        // استخراج أكبر رقم في num
        while (temp > 0) {
            int digit = temp % 10;

            maxDigit = max(maxDigit, digit);

            temp /= 10;
        }

        // نطرح أكبر رقم
        num -= maxDigit;
        count++;
    }

    cout << count << '\n';
}

int main() {
    ios::sync_with_stdio(false);
    cin.tie(nullptr);

    solve();

    return 0;
}
