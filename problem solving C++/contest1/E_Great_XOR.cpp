#include <iostream>
#include <vector>
#include <algorithm>
#include <string>
#include <format>
#include <bitset>

using namespace std;
void solve()
{
    int t;
    cin >> t;
    while (t--)
    {
        int n;
        cin >> n;
        string nBin = format("{:b}", n);
        int temp = 0;
        for (int i = nBin.size() - 1; i >= 0; i--)
        {
            if (nBin[i] == '0')
            {
                temp = i;
            }
        }
        int len = nBin.size();
        int ans = 0;
        for (int i = 1; i < n; i++)
        {
            string s = bitset<32>(i).to_string();
            s = s.substr(32 - len, len);
            for (int i = s.size() - 1; i >= temp; i--)
            {
                if (i == temp && s[i] == '1')
                {
                    ans += 1;
                }
                if (s[i])
                {
                    continue;
                }
                else
                {
                    break;
                }
            }
            // for (int i = 0; i < s.size(); i++)
            // {
            //     if(s[i] == nBin[i]){
            //         continue;
            //     }else{

            //     }
            // }

            // if (s[s.size() - 1] != nBin[nBin.size() - 1] &&
            //     s[s.size() - 2] != nBin[nBin.size() - 2])
            // {
            //     ans++;
            // }
        }
        cout << ans << endl;
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}