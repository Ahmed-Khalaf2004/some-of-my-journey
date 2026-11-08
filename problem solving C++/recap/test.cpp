#include <iostream>
#include <bits/stdc++.h>
#include <cmath>

using namespace std;

vector<int> sieveOfEratosthenes(int n)
{
    vector<bool> is_prime(n + 1, true);
    is_prime[0] = is_prime[1] = false;

    for (int p = 2; p * p <= n; p++)
    {
        if (is_prime[p])
        {
            for (int i = p * p; i <= n; i += p)
            {
                is_prime[i] = false;
            }
        }
    }

    vector<int> primes;
    for (int i = 2; i <= n; i++)
    {
        if (is_prime[i])
        {
            primes.push_back(i);
        }
    }
    return primes;
}

void Solve()
{
    long long n, p;
    cin >> n >> p;
    std::vector<int> h(n);
    int cnt = 0;
    for (int i = 0; i < n; ++i)
    {
        cin >> h[i];
    }
    sort(h.begin(), h.end());
    for (int i = 0; i < n; ++i)
    {

        if (p >= h[i])
        {
            cnt++;
            if (h[i] > 2)
            {
                bool find = false;
                // for (int j=2; j * j <= h[i]; ++j)
                // {
                // 	if(h[i]%j==0)
                // 	{
                // 		p+=j;
                // 		find=true;
                // 		break;
                // 	}
                // }
                vector<int> v = sieveOfEratosthenes(h[i]);
                p += *lower_bound(v.begin(), v.end(), h[i]);
                if (!find)
                {
                    p += h[i];
                }
            }
            else if (h[i] == 2)
            {
                p += 2;
            }
        }
        else
        {
            break;
        }
    }
    cout << cnt << ' ' << p << '\n';
}

int main()
{

    ios_base::sync_with_stdio(0);
    cin.tie(0);
    cout.tie(0);
#ifndef ONLINE_JUDGE
    freopen("input.txt", "r", stdin);
    freopen("output.txt", "w", stdout);
#endif

    int t = 1;

    cin >> t;

    while (t--)
    {
        Solve();
    }

    return 0;
}