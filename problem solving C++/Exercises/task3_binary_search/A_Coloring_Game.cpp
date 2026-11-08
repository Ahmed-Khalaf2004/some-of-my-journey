// // // sorry python, its time to go :<
// // #include <iostream>
// // #include <vector>
// // #include <algorithm>
// // #include <string>

// // using namespace std;

// // // mession: num of possibilities to win.
// // // combination is the solution with base 3 if all test cases success, then will eleminate each case didnt vertify the condetion.
// // // didnt find a way to eleminate so lets try another solution.

// // // secound idea:
// // // cover all posibilities then binary search at them until find the x.
// // // but whats the condetion or equasion that will find x?

// // // int x = 0;
// // // bool check(int n, vector<int> v, int x)
// // // {

// // // }
// // void solve()
// // {
// //     int t;
// //     cin >> t;
// //     while (t)
// //     {
// //         t -= 1;
// //         int n;
// //         cin >> n;
// //         vector<int> v(n);
// //         for (int i = 0; i < n; i++)
// //         {
// //             cin >> v[i];
// //         }
// //         for(int i=0; i<n; i++){
// //             for(int j=i; i<n; j++){

// //             }
// //         }

// //         // int l(0), r(100);
// //         // while (r > l + 1)
// //         // {
// //         //     int mid = (l + r) / 2;
// //         //     if (check(n, v, x))
// //         //     {
// //         //         r = mid;
// //         //     }
// //         //     else
// //         //     {
// //         //         l = mid;
// //         //     }
// //         // }
// //     }
// // }

// // int main()
// // {
// //     ios_base::sync_with_stdio(false);
// //     cin.tie(NULL);
// //     solve();
// //     return 0;
// // }

// // #include <iostream>
// // #include <vector>
// // #include <algorithm>

// // using namespace std;

// // void solve()
// // {
// //     int n;
// //     cin >> n;
// //     vector<int> a(n);
// //     for (int i = 0; i < n; i++)
// //     {
// //         cin >> a[i];
// //     }

// // sort(a.begin(), a.end());

// // long long possibilities = 0;

// // int max_bob = a[n - 1];

// // for (int i = 0; i < n; i++)
// // {
// //     for (int j = i + 1; j < n; j++)
// //     {
// //         int sum;

// //         auto it = a.end()  - 1;
// //         if(lower_bound(a.begin(), a.end(), a[j]) == it){
// //             sum = a[lower_bound(a.begin(), a.end(), a[j-1])] + a[lower_bound(a.begin(), a.end(), a[j-2])] + a[lower_bound(a.begin(), a.end(), a[j-3])];
// //         }else if (lower_bound(a.begin(), a.end(), a[i]) == it)
// //         {
// //             sum = a[lower_bound(a.begin(), a.end(), a[j-1])] + a[lower_bound(a.begin(), a.end(), a[j-2])] + a[lower_bound(a.begin(), a.end(), a[j-3])];
// //         }else{
// //             sum = a[i] + a[j] + a[upper_bound(a.begin(), a.end(), a[j])];
// //         }

// //         if (sum > max_bob)
// //         {
// //             possibilities++;
// //         }
// //     }
// // }
// // 2. تثبيت عنصرين من خلال حلقتين تكراريتين
// // for (int i = 0; i < n; i++)
// // {
// //     for (int j = i + 1; j < n; j++)
// //     {
// //         long long sum = 0;

// //         auto it = a.end() - 1;
// //         auto lb = lower_bound(a.begin(), a.end(), a[j]);

// //         if (lb == it)
// //         {
// //             // لحماية الذاكرة من الخروج عن الحدود، نتحقق من أن j >= 3
// //             if (j >= 3)
// //             {
// //                 auto lb1 = lower_bound(a.begin(), a.end(), a[j - 1]);
// //                 auto lb2 = lower_bound(a.begin(), a.end(), a[j - 2]);
// //                 auto lb3 = lower_bound(a.begin(), a.end(), a[j - 3]);
// //                 sum = *lb1 + *lb2 + *lb3;
// //             }
// //         }
// //         else
// //         {
// //             auto ub = upper_bound(a.begin(), a.end(), a[j]);
// //             // لاستخراج القيمة الفعلية من المؤشر نستخدم علامة النجمة (*)
// //             if (ub != a.end())
// //             {
// //                 sum = a[i] + a[j] + *ub;
// //             }
// //             else
// //             {
// //                 sum = a[i] + a[j] + a.back();
// //             }
// //         }

// //         if (sum > max_bob)
// //         {
// //             possibilities++;
// //         }
// //     }
// // }

// // أكبر عنصر يختاره بوب سيكون دائماً العنصر الأخير بعد الترتيب
// // 1 2 3
// // 2 3 3 4 5 5
// //     long long possibilities = 0;
// //     long long max_val = a[n - 1];
// //     for (int i = 0; i < n; i++)
// //     {
// //         for (int j = i + 1; j < n; j++)
// //         {
// //             if (a[j] == max_val)
// //             {
// //                 if (a[i] + a[j] + *lower_bound(a.begin(), a.end(), a[j]) > a[j])
// //                 {
// //                     possibilities += 1;
// //                 }
// //             }
// //             else
// //             {
// //                 if (*upper_bound(a.begin(), a.end(), a[j]) != max_val)
// //                 {
// //                     if (a[i] + a[j] + *upper_bound(a.begin(), a.end(), a[j]) > max_val)
// //                     {
// //                         possibilities += 1;
// //                     }
// //                 }
// //                 else
// //                 {
// //                     if (a[i] + a[j] > max_val)
// //                     {
// //                         possibilities += 1;
// //                     }
// //                 }
// //             }
// //         }
// //     }
// //     cout << possibilities << "\n";
// // }
// //     long long ans = 0;

// //     for (int k = 2; k < n; k++)
// //     {
// //         int need = max(a[k], a[n - 1] - a[k]);

// //         int i = 0;
// //         int j = k - 1;

// //         while (i < j)
// //         {
// //             if (a[i] + a[j] > need)
// //             {
// //                 ans += j - i;
// //                 j--;
// //             }
// //             else
// //             {
// //                 i++;
// //             }
// //         }
// //     }
// //     cout << ans << "\n";

// // 1 2 3
// // 2 3 3 4 5 5
// // 1 1 1 4 5 5
// // case 1
// // int idx_one;
// // int ans = 0;
// // // we specify where all possibilites from i until end will success
// // for (int i = 0; i < n - 1; i++)
// // {
// //     if (n > 2)
// //     {
// //         if (a[i] + a[i + 1] + a[i + 2] > a[n - 1])
// //         {
// //             idx_one = i;
// //             break;
// //         }
// //     }
// // }
// // we have the index that all possibilities will surly success

// // case 2
// // now lets specify the rest of possibilities that we didnt count
// // int idx_two;

// // for(int i = 0; i<idx_one; i--){
// //     if(a[n-2] + a[n-3] + a[i] > a[n-1]){
// //         idx_two = i;
// //         break;
// //     }
// // }

// //     if(idx_one == idx_two){
// //         // meen that there is no posibilities extra than case 1, and we will find the combination from index_one untilll the n

// //     }else{
// //         // meen that there is possibilities extra than case 1, we will sum the combination of case 1 + new possibilities from case 2

// //     }
// // }

// // int main()
// // {
// //     ios_base::sync_with_stdio(false);
// //     cin.tie(NULL);

// //     int t;
// //     cin >> t;
// //     while (t--)
// //     {
// //         solve();
// //     }

// //     return 0;
// // }

// #include <iostream>
// #include <vector>
// #include <algorithm>

// using namespace std;

// void solve()
// {
//     int n;
//     cin >> n;

//     vector<int> a(n);
//     for (int i = 0; i < n; i++)
//     {
//         cin >> a[i];
//     }

//     long long ans = 0;

//     // case 1:
//     // Find the first index where every 3 combination
//     // from this index until n-1 is guaranteed to work.

//     int idx_one = n;
//     for (int i = 0; i < n - 1; i++)
//     {
//         if (a[i] + a[i + 1] > a[n - 1])
//         {
//             idx_one = i;
//             break;
//         }
//     }

//     // all 3 combinations inside idx_one to n-1 will success;
//     if (idx_one < n)
//     {
//         long long m = n - idx_one;
//         // C(m, 3)
//         ans += m * (m - 1) * (m - 2) / 6;
//     }

//     // case 2:
//     // Count combinations where at least one element is before idx_one.
//     for (int k = idx_one; k < n; k++)
//     {
//         for (int i = 0; i < idx_one; i++)
//         {
//             // we need:
//             // a[i] + a[j] + a[k] > a[n-1]
//             // and:
//             // a[i] + a[j] > max(a[k], a[n-1] - a[k])

//             int need = max(a[k], a[n - 1] - a[k]);

//             // we need:
//             // a[j] > need - a[i]

//             auto it = upper_bound(
//                 a.begin() + i + 1,
//                 a.begin() + k,
//                 need - a[i]);
//             int j = it - a.begin();
//             ans += k - j;
//         }
//     }

//     cout << ans << '\n';
// }

// int main()
// {
//     ios::sync_with_stdio(false);
//     cin.tie(nullptr);

//     int t;
//     cin >> t;

//     while (t--)
//         solve();

//     return 0;
// }

#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
// 6
// 2 3 3 4 5 5
int posibilities = 0;
bool check(long long x, vector<int> box, int n)
{

    for (int i = 0; i < box.size(); i++)
    {
        if (x + box[i] < box[n - 1])
        {
            return true;
        }
        else
        {
            posibilities += (n - i);
            return x < false;
        }
    }
}
void solve()
{
    int t;
    cin >> t;
    while (t)
    {
        t -= 1;

        int n;
        cin >> n;
        vector<int> v(n);
        for (int i = 0; i < n; i++)
        {
            cin >> v[i];
        }
        long long l(-1), r(v.size());
        while (r > l + 1)
        {
            int mid = l + (r - l + 1) / 2;
            if (check())
            {
                r = mid;
            }
            else
            {
                l = mid;
            }
        }
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}