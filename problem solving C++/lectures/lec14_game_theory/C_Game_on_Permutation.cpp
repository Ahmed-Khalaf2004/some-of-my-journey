#include <iostream>
#include <vector>
#include <algorithm>
#include <string>
#include <map>
const long long INF = 1e9;
using namespace std;

void solve()
{
    int t;
    cin >> t;
    while (t--)
    {
        int n;
        cin >> n;
        vector<int> v(n);
        for (int i = 0; i < n; i++)
        {
            cin >> v[i];
        }

        int luc(INF), unc(v[0]);
        // to be a lucky: 1. before you will be an unlucky min than you + all values min than you shoud be unc
        int sum = 0;
        for (int i = 0; i < v.size(); i++)
        {
            if (v[i] > unc)
            {
                if (luc < v[i])
                {
                    unc = min(v[i], unc);
                }
                else
                {
                    luc = min(v[i], luc);

                    sum++;
                }
            }
            else
            {
                unc = v[i];
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