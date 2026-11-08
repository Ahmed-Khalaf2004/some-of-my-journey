// #include <iostream>
// #include <vector>
// #include <algorithm>
// #include <string>
// #include <math.h>

// using namespace std;
// void solve()
// {
//     // we cant calculate all possibilities, because of the constraints.

//     int n;
//     cin >> n;
//     vector<long long> seq(n);
//     for (int i; i < n; i++)
//     {
//         cin >> seq[i];
//     }
//     // pring the divisors for each element to count the possibilities. (the output from the loop is the positions that seq[i] can be in subseq)
//     vector<int> divi(n);
//     for (int i = 1; i <= sqrt(n); i++)
//     {
//         if (n % i == 0)
//         {
//             cout <<  i<< " ";
//             cout << n / i << " ";
//         }
//     }
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
#include <math.h>
using namespace std;

// to avoid overflow
const long long MOD = 1e9 + 7;

void solve()
{
    int n;
    cin >> n;

    vector<int> original_seq(n);

    for (int i = 0; i < n; i++)
    {
        cin >> original_seq[i];
    }

    vector<long long> dp(n + 1);

    dp[0] = 1;

    for (int i = 0; i < n; i++)
    {
        vector<int> divisors;
        // find the divisors for each num, to know whats positions the element can be at subseq
        // (another way to find divisor from sqrt(n) that we used al lecture, but the same idea)

        // 20
        // 1 * 20
        // 2 * 10
        // 4 * 5
        for (int div = 1; div * div <= original_seq[i]; div++)
        {
            if (original_seq[i] % div == 0)
            {
                if (div <= i + 1)
                    divisors.push_back(div);

                int other_part = original_seq[i] / div;

                if (other_part != div && other_part <= i + 1)
                    divisors.push_back(other_part);
            }
        }

        sort(divisors.rbegin(), divisors.rend());

        for (int div : divisors)
        {
            dp[div] = (dp[div] + dp[div - 1]) % MOD;
        }
    }

    long long ans = 0;

    // sum all possibillities
    for (int i = 1; i <= n; i++)
    {
        ans = (ans + dp[i]) % MOD;
    }

    cout << ans << '\n';
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(nullptr);

    // solve();
    string firstName = "John ";
string lastName = "Doe";
string fullName = firstName.append(lastName);
cout << fullName;

    return 0;
}