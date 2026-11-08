#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int t;
    cin >> t;
    while (t--)
    {
        int a, b, x, y;
        cin >> a >> b >> x >> y;
        // 1 4 1 2
        if (a - 1 == b and (a & 1))
        {
            cout << y << endl;
            continue;
        }
        else if (a > b)
        {
            cout << -1 << endl;
            continue;
        }

        if (x <= y)
        {
            cout << (b - a) * x << endl;
            continue;
        }

        int sum = 0;
        for (int i = a; i < b; i++)
        {
            if (i & 1)
            {
                sum += x;
            }
            else
            {
                sum += y;
            }
        }
        cout << sum << endl;
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}