#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;

// mid, recipe, home, price, stock, b_nums, s_nums, c_nums
// bool cheak(long long x, vector<int> home, vector<int> price, long long stock, long long b_nums, long long s_nums, long long c_nums)
// {

//     long long needed_b = b_nums * x;
//     long long needed_s = s_nums * x;
//     long long needed_c = c_nums * x;

//     long long buy_b = 0;
//     if (needed_b > home[0])
//         buy_b = needed_b - home[0];

//     long long buy_s = 0;
//     if (needed_s > home[1])
//         buy_s = needed_s - home[1];

//     long long buy_c = 0;
//     if (needed_c > home[2])
//         buy_c = needed_c - home[2];

//     long long cost = buy_b * price[0] + buy_s * price[1] + buy_c * price[2];

//     return cost <= stock;
// }

// void solve()
// {
// string recipe;
// vector<int> home(3);
// vector<int> price(3);
// long long stock;

// cin >> recipe;
// for (int i = 0; i < 3; i++)
// {
//     cin >> home[i];
// }
// for (int i = 0; i < 3; i++)
// {
//     cin >> price[i];
// }
// cin >> stock;

// long long b_nums = 0, s_nums = 0, c_nums = 0;
// for (char ch : recipe)
// {
//     if (ch == 'B')
//         b_nums++;
//     else if (ch == 'S')
//         s_nums++;
//     else if (ch == 'C')
//         c_nums++;
// }

// first idea and try succeeded, but its complixity is too high because r reache 1e12:
// BBBSSC
// 6 4 1
// 1 2 3
// 4
// int b_quan = home[0];
// int s_quan = home[1];
// int c_quan = home[2];
// if (b_nums == 0)
// {
//     while (stock > 0)
//     {
//         int s_from_home = s_quan / s_nums;
//         int c_from_home = c_quan / c_nums;
//         int we_need = min(s_from_home, c_from_home);

//         if (we_need == s_from_home)
//         {
//             if (stock >= price[1])
//             {
//                 stock -= price[1];
//                 s_quan += 1;
//             }
//             else
//                 break;
//         }
//         else
//         {
//             if (stock >= price[2])
//             {
//                 stock -= price[2];
//                 c_quan += 1;
//             }
//             else
//                 break;
//         }
//         if (stock < price[1] && stock < price[2])
//             break;
//     }
// }
// else if (s_nums == 0)
// {
//     while (stock > 0)
//     {
//         int b_from_home = b_quan / b_nums;
//         int c_from_home = c_quan / c_nums;
//         int we_need = min(b_from_home, c_from_home);

//         if (we_need == b_from_home)
//         {
//             if (stock >= price[0])
//             {
//                 stock -= price[0];
//                 b_quan += 1;
//             }
//             else
//                 break;
//         }
//         else
//         {
//             if (stock >= price[2])
//             {
//                 stock -= price[2];
//                 c_quan += 1;
//             }
//             else
//                 break;
//         }
//         if (stock < price[0] && stock < price[2])
//             break;
//     }
// }
// else if (c_nums == 0)
// {
//     while (stock > 0)
//     {
//         int b_from_home = b_quan / b_nums;
//         int s_from_home = s_quan / s_nums;
//         int we_need = min(b_from_home, s_from_home);

//         if (we_need == b_from_home)
//         {
//             if (stock >= price[0])
//             {
//                 stock -= price[0];
//                 b_quan += 1;
//             }
//             else
//                 break;
//         }
//         else
//         {
//             if (stock >= price[1])
//             {
//                 stock -= price[1];
//                 s_quan += 1;
//             }
//             else
//                 break;
//         }
//         if (stock < price[0] && stock < price[1])
//             break;
//     }
// }
// else
// {
//     while (stock > 0)
//     {
//         int b_from_home = b_quan / b_nums;
//         int s_from_home = s_quan / s_nums;
//         int c_from_home = c_quan / c_nums;
//         int we_need = min({b_from_home, s_from_home, c_from_home});

//         if (we_need == b_from_home)
//         {
//             if (stock >= price[0])
//             {
//                 stock -= price[0];
//                 b_quan += 1;
//             }
//             else
//                 break;
//         }
//         else if (we_need == s_from_home)
//         {
//             if (stock >= price[1])
//             {
//                 stock -= price[1];
//                 s_quan += 1;
//             }
//             else
//                 break;
//         }
//         else if (we_need == c_from_home)
//         {
//             if (stock >= price[2])
//             {
//                 stock -= price[2];
//                 c_quan += 1;
//             }
//             else
//                 break;
//         }

//         if (stock < price[0] && stock < price[1] && stock < price[2])
//         {
//             break;
//         }
//     }
// }
// // BBBSSC
// int ans = min({b_quan, s_quan, c_quan});
// cout << ans;

// secound try
// binary search until find the ans
// we will binary search from 0 to 1e12, becausse its not possible that answer will be grater than r
// whats the condition that will stop searching? stock become < all price elemens

//     string recipe;
//     vector<int> home(3);
//     vector<int> price(3);
//     long long stock;

//     cin >> recipe;
//     for (int i = 0; i < 3; i++)
//     {
//         cin >> home[i];
//     }
//     for (int i = 0; i < 3; i++)
//     {
//         cin >> price[i];
//     }
//     cin >> stock;

//     long long b_nums = 0, s_nums = 0, c_nums = 0;
//     for (char ch : recipe)
//     {
//         if (ch == 'B')
//             b_nums++;
//         else if (ch == 'S')
//             s_nums++;
//         else if (ch == 'C')
//             c_nums++;
//     }

//     // we have home_hamburgers and hamburgers that we want to buy, we will start with home_hamburgers:
//     long long home_hamburgers;
//     if (b_nums > 0)
//         home_hamburgers = home[0] / b_nums;
//     else if (s_nums > 0)
//         home_hamburgers = home[1] / s_nums;
//     else
//         home_hamburgers = home[2] / c_nums;

//     if (s_nums > 0)
//         home_hamburgers = min(home_hamburgers, home[1] / s_nums);

//     if (c_nums > 0)
//         home_hamburgers = min(home_hamburgers, home[2] / c_nums);

//     home[0] -= b_nums * home_hamburgers;
//     home[1] -= s_nums * home_hamburgers;
//     home[2] -= c_nums * home_hamburgers;

//     // now hamburgers that we want to buy, using binary search:
//     long long l(0), r(1e12);
//     while (r > l + 1)
//     {
//         long long mid = (l + r) / 2;
//         if (cheak(mid, home, price, stock, b_nums, s_nums, c_nums))
//         {
//             l = mid;
//         }
//         else
//         {
//             r = mid;
//         }
//     }
//     cout << home_hamburgers + l << '\n';
// }

// int main()
// {
//     ios_base::sync_with_stdio(false);
//     cin.tie(NULL);
//     solve();
//     return 0;
// }

#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;

bool check(long long x,
           vector<long long> home,
           vector<long long> price,
           long long stock,
           long long b_nums,
           long long s_nums,
           long long c_nums)
{
    long long needed_b = b_nums * x;
    long long needed_s = s_nums * x;
    long long needed_c = c_nums * x;

    long long buy_b = max(0LL, needed_b - home[0]);
    long long buy_s = max(0LL, needed_s - home[1]);
    long long buy_c = max(0LL, needed_c - home[2]);

    long long cost =
        buy_b * price[0] +
        buy_s * price[1] +
        buy_c * price[2];

    return cost <= stock;
}

void solve()
{
    string recipe;
    vector<long long> home(3);
    vector<long long> price(3);
    long long stock;

    cin >> recipe;

    for (int i = 0; i < 3; i++)
        cin >> home[i];

    for (int i = 0; i < 3; i++)
        cin >> price[i];

    cin >> stock;

    long long b_nums = 0;
    long long s_nums = 0;
    long long c_nums = 0;

    for (char ch : recipe)
    {
        if (ch == 'B')
            b_nums++;
        else if (ch == 'S')
            s_nums++;
        else if (ch == 'C')
            c_nums++;
    }

    // Binary search for the total number of hamburgers
    long long l = 0;
    long long r = 10000000000000LL; // 1e13

    while (l < r)
    {
        long long mid = l + (r - l + 1) / 2;

        if (check(mid, home, price, stock,
                  b_nums, s_nums, c_nums))
        {
            l = mid;
        }
        else
        {
            r = mid - 1;
        }
    }

    cout << l << '\n';
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);

    solve();

    return 0;
}