#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int t;
    cin >> t;

    while (t)
    {
        t -= 1;
        long long n;
        cin >> n;

        vector<long long> a(n);

        for (long long i = 0; i < n; i++)
            cin >> a[i];

        long long d = a[1] - a[0];

        bool test = true;

        for (long long i = 1; i < n - 1; i++)
        {
            if (a[i + 1] - a[i] != d)
            {
                test = false;
                break;
            }
        }

        if (!test)
        {
            cout << "NO" << "\n";
            continue;
        }

        // a[0] = x + n*y
        // d = x - y

        // y = (a[0] - d) / (n + 1)
        long long temp = a[0] - d;

        if (temp < 0 || temp % (n + 1) != 0)
        {
            cout << "NO" << "\n";
            continue;
        }

        long long y = temp / (n + 1);
        long long x = y + d;

        if (x >= 0 && y >= 0)
            cout << "YES" << "\n";
        else
            cout << "NO" << "\n";
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);

    solve();

    return 0;
}