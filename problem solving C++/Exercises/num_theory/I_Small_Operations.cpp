#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;

// bool is_prime(int num)
// {
//     if (num < 2)
//         return false;

//     for (int i = 2; i * i <= num; i++)
//     {
//         if (num % i == 0)
//             return false;
//     }

//     return true;
// }

// vector<int> sieve(int n)
// {
//     vector<int> res;

//     for (int i = 2; i <= n; i++)
//     {
//         if (is_prime(i))
//         {
//             res.push_back(i);
//         }
//     }

//     return res;
// }

// int gcp(int a, int b){
//     return b? gcp(b, a%b) : a;
// }

void solve()
{
    int t;
    cin >> t;
    while (t)
    {
        t--;
        long long x, y, k;
        cin >> x >> y >> k;
        // x --> y
        // x = x*a
        // x = x/a
        // untill reach y
        // first we  will y % x, if 0 then k>2? then x*=2 untill equal;
        // secound we will gcd(x,y) and x*=
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}
