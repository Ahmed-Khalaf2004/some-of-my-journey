#include <iostream>
#include <vector>
#include <algorithm>

using namespace std;
// so close to burger problem
// 3 1
// 2 1 4         ingrediants_gram_amount
bool check(long long x, vector<long long> ingrediants_gram_amount, vector<long long> home_ingrediants, long long k)
{
    // the wrong at first submition was here because overflow, ll * ll, so huge number. (to be honest i asked ai for this problem because there is no time and i dont see any wrong at my code, and told me the problem and the solution __int128 :> )
    __int128 needed_magic = 0;
    for (int i = 0; i < ingrediants_gram_amount.size(); i++)
    {
        __int128 needed = (__int128)ingrediants_gram_amount[i] * x;

        if (needed > home_ingrediants[i])
        {
            needed_magic += needed - home_ingrediants[i];
            if (needed_magic > k)
                return false;
        }
    }

    return true;
}

void solve()
{
    int n;
    long long k;

    cin >> n >> k;

    vector<long long> ingrediants_gram_amount(n);
    vector<long long> home_ingrediants(n);

    for (int i = 0; i < n; i++)
        cin >> ingrediants_gram_amount[i];

    for (int i = 0; i < n; i++)
        cin >> home_ingrediants[i];

    long long l = 0;
    long long r = 1e13;

    while (l < r)
    {
        long long mid = l + (r - l + 1) / 2;
        if (check(mid, ingrediants_gram_amount, home_ingrediants, k))
        {
            l = mid;
        }
        else
        {
            r = mid - 1;
        }
    }

    cout << l;
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);

    solve();

    return 0;
}