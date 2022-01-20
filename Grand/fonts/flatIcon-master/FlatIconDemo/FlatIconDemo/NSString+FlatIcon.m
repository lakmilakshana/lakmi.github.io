/*
 Copyright (c) 2015, Pablo Alcalde. All rights reserved.
 Licensed under the MIT license <http://opensource.org/licenses/MIT>
 
 Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 documentation files (the "Software"), to deal in the Software without restriction, including without limitation
 the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and
 to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 
 The above copyright notice and this permission notice shall be included in all copies or substantial portions
 of the Software.
 
 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
 TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
 CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 IN THE SOFTWARE.
 */

#import "NSString+FlatIcon.h"

@implementation NSString (FlatIcon)
+ (NSString*)flatIconStringForEnum:(FlatIcon)value {
    return [NSString flatIconUnicodeStrings][value];
}

+ (NSArray *)flatIconUnicodeStrings {
    
    static NSArray *flatIconUnicodeStrings;
    
    static dispatch_once_t unicodeStringsOnceToken;
    dispatch_once(&unicodeStringsOnceToken, ^{ //the array contains from 0 to 325 hexadecimal char
        
        flatIconUnicodeStrings = @[@"\ue000",@"\ue001",@"\ue002",@"\ue003",@"\ue004",@"\ue005",@"\ue006",@"\ue007",@"\ue008",@"\ue009",@"\ue00a",@"\ue00b",@"\ue00c",@"\ue00d",@"\ue00e",@"\ue00f",@"\ue010",@"\ue011",@"\ue012",@"\ue013",@"\ue014",@"\ue015",@"\ue016",@"\ue017",@"\ue018",@"\ue019",@"\ue01a",@"\ue01b",@"\ue01c",@"\ue01d",@"\ue01e",@"\ue01f",@"\ue020",@"\ue021",@"\ue022",@"\ue023",@"\ue024",@"\ue025",@"\ue026",@"\ue027",@"\ue028",@"\ue029",@"\ue02a",@"\ue02b",@"\ue02c",@"\ue02d",@"\ue02e",@"\ue02f",@"\ue030",@"\ue031",@"\ue032",@"\ue033",@"\ue034",@"\ue035",@"\ue036",@"\ue037",@"\ue038",@"\ue039",@"\ue03a",@"\ue03b",@"\ue03c",@"\ue03d",@"\ue03e",@"\ue03f",@"\ue040",@"\ue041",@"\ue042",@"\ue043",@"\ue044",@"\ue045",@"\ue046",@"\ue047",@"\ue048",@"\ue049",@"\ue04a",@"\ue04b",@"\ue04c",@"\ue04d",@"\ue04e",@"\ue04f",@"\ue050",@"\ue051",@"\ue052",@"\ue053",@"\ue054",@"\ue055",@"\ue056",@"\ue057",@"\ue058",@"\ue059",@"\ue05a",@"\ue05b",@"\ue05c",@"\ue05d",@"\ue05e",@"\ue05f",@"\ue060",@"\ue061",@"\ue062",@"\ue063",@"\ue064",@"\ue065",@"\ue066",@"\ue067",@"\ue068",@"\ue069",@"\ue06a",@"\ue06b",@"\ue06c",@"\ue06d",@"\ue06e",@"\ue06f",@"\ue070",@"\ue071",@"\ue072",@"\ue073",@"\ue074",@"\ue075",@"\ue076",@"\ue077",@"\ue078",@"\ue079",@"\ue07a",@"\ue07b",@"\ue07c",@"\ue07d",@"\ue07e",@"\ue07f",@"\ue080",@"\ue081",@"\ue082",@"\ue083",@"\ue084",@"\ue085",@"\ue086",@"\ue087",@"\ue088",@"\ue089",@"\ue08a",@"\ue08b",@"\ue08c",@"\ue08d",@"\ue08e",@"\ue08f",@"\ue090",@"\ue091",@"\ue092",@"\ue093",@"\ue094",@"\ue095",@"\ue096",@"\ue097",@"\ue098",@"\ue099",@"\ue09a",@"\ue09b",@"\ue09c",@"\ue09d",@"\ue09e",@"\ue09f",@"\ue0a0",@"\ue0a1",@"\ue0a2",@"\ue0a3",@"\ue0a4",@"\ue0a5",@"\ue0a6",@"\ue0a7",@"\ue0a8",@"\ue0a9",@"\ue0aa",@"\ue0ab",@"\ue0ac",@"\ue0ad",@"\ue0ae",@"\ue0af",@"\ue0b0",@"\ue0b1",@"\ue0b2",@"\ue0b3",@"\ue0b4",@"\ue0b5",@"\ue0b6",@"\ue0b7",@"\ue0b8",@"\ue0b9",@"\ue0ba",@"\ue0bb",@"\ue0bc",@"\ue0bd",@"\ue0be",@"\ue0bf",@"\ue0c0",@"\ue0c1",@"\ue0c2",@"\ue0c3",@"\ue0c4",@"\ue0c5",@"\ue0c6",@"\ue0c7",@"\ue0c8",@"\ue0c9",@"\ue0ca",@"\ue0cb",@"\ue0cc",@"\ue0cd",@"\ue0ce",@"\ue0cf",@"\ue0d0",@"\ue0d1",@"\ue0d2",@"\ue0d3",@"\ue0d4",@"\ue0d5",@"\ue0d6",@"\ue0d7",@"\ue0d8",@"\ue0d9",@"\ue0da",@"\ue0db",@"\ue0dc",@"\ue0dd",@"\ue0de",@"\ue0df",@"\ue0e0",@"\ue0e1",@"\ue0e2",@"\ue0e3",@"\ue0e4",@"\ue0e5",@"\ue0e6",@"\ue0e7",@"\ue0e8",@"\ue0e9",@"\ue0ea",@"\ue0eb",@"\ue0ec",@"\ue0ed",@"\ue0ee",@"\ue0ef",@"\ue0f0",@"\ue0f1",@"\ue0f2",@"\ue0f3",@"\ue0f4",@"\ue0f5",@"\ue0f6",@"\ue0f7",@"\ue0f8",@"\ue0f9",@"\ue0fa",@"\ue0fb",@"\ue0fc",@"\ue0fd",@"\ue0fe",@"\ue0ff",@"\ue100",@"\ue101",@"\ue102",@"\ue103",@"\ue104",@"\ue105",@"\ue106",@"\ue107",@"\ue108",@"\ue109",@"\ue10a",@"\ue10b",@"\ue10c",@"\ue10d",@"\ue10e",@"\ue10f",@"\ue110",@"\ue111",@"\ue112",@"\ue113",@"\ue114",@"\ue115",@"\ue116",@"\ue117",@"\ue118",@"\ue119",@"\ue11a",@"\ue11b",@"\ue11c",@"\ue11d",@"\ue11e",@"\ue11f",@"\ue120",@"\ue121",@"\ue122",@"\ue123",@"\ue124",@"\ue125",@"\ue126",@"\ue127",@"\ue128",@"\ue129",@"\ue12a",@"\ue12b",@"\ue12c",@"\ue12d",@"\ue12e",@"\ue12f",@"\ue130",@"\ue131",@"\ue132",@"\ue133",@"\ue134",@"\ue135",@"\ue136",@"\ue137",@"\ue138",@"\ue139",@"\ue13a",@"\ue13b",@"\ue13c",@"\ue13d",@"\ue13e",@"\ue13f",@"\ue140",@"\ue141",@"\ue142",@"\ue143",@"\ue144"];
        
    });
    
    return flatIconUnicodeStrings;
}

@end
