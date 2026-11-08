#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int n;
    cin >> n;
    vector<int> v(n);
    for (int i = 0; i < n; i++)
    {
        cin >> v[i];
    }

    sort(v.begin(), v.end());
    int num_of_v = n / 3;

    for (int j = 0; j < num_of_v; j++)
    {
        int a = v[j];
        int b = v[j + num_of_v];
        int c = v[j + 2 * num_of_v];

        if (!(a < b && b < c && b % a == 0 && c % b == 0))
        {
            cout << -1;
            return;
        }
    }

    // for (int j = 0; j < v.size(); j++)
    // {
    //     if (j >= v.size() - 1)
    //         break;
    //     if ((v[j] > v[j + num_of_v]) || (v[j] == v[j + num_of_v]))
    //     {
    //         cout << -1;
    //         return;
    //     }
    // }

    for (int i = 0; i < num_of_v; i++)
    {
        for (int j = i; j < v.size(); j += num_of_v)
        {
            cout << v[j] << " ";
        }
        cout << "\n";
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}