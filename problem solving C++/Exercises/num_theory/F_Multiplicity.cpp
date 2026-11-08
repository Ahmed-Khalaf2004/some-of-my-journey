#include <iostream>
#include <vector>
#include <algorithm>
#include <string>
#include <math.h>

using namespace std;
void solve()
{
    // the problem is if we cant calculate all possibilities, because of the constraints.
    // 2
    // 1 2
    // 3

    // 5
    // 2 2 1 22 14
    // 13

    int n;
    cin >> n;
    vector<long long> seq(n);
    for (int i; i < n; i++)
    {
        cin >> seq[i];
    }
    // pring the divisors for each element to count the possibilities. (the output from the loop is the positions that seq[i] can be in subseq)
    vector<int> divi(n);
    for (int i = 1; i <= sqrt(n); i++)
    {
        if (n % i == 0)
        {
            cout << i << " ";
            cout << n / i << " ";
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