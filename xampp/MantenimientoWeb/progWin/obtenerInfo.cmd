echo.>logPC.txt
WMIC BIOS Get SerialNumber > logPC.txt
wmic computersystem get manufacturer >> logPC.txt
wmic csproduct get name >> logPC.txt
wmic MemoryChip get Capacity >> logPC.txt
wmic cpu get name >> logPC.txt
wmic diskdrive get size >> logPC.txt
