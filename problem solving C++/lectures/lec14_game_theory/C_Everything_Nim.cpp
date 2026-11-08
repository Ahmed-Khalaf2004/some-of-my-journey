#include <iostream>
#include <vector>
#include <algorithm>
#include <string>
#include <map>

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
        bool current_sit = true; // تمثل sit[n] = 1

        for (int i = n - 1; i >= 0; i--)
        {
            int diff = v[i + 1] - v[i];

            if (diff == 1)
            {
                current_sit = !current_sit;
            }
            else if (diff > 1)
            {
                current_sit = false;
            }
            // إذا كان diff == 0 تبقى current_sit كما هي
        }

        cout << (current_sit ? "Bob" : "Alice") << endl;
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}